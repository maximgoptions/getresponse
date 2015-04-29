<?php

namespace Getresponse360\GetresponseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Getresponse360\ReplicatorBundle\Services\JsonRPCClient;
use Getresponse360\ReplicatorBundle\Entity;
use Getresponse360\ReplicatorBundle\Services;
use Getresponse360\GetresponseBundle\Entity as MyEntities;

class GetResponseController extends Controller
{
	private $NewCount = null;
	private $SavedCount = null;
	private $CID = null;
	private $Last = null;
	private $Client = null;
    /**
     * @Route("/getresponse")
     * @Template()
     */
    public function indexAction()
    {
    	$SetManager = $this->getDoctrine()->getManager();
    	$Settings = $SetManager->getRepository('Getresponse360\GetresponseBundle\Entity\Settings')->findOneBy(array('id' => '0')); //getAny()->getOneOrNullResult();
    	$Current = $Settings->getCurrent();
    	$emReplicator = $this->getDoctrine()->getManager('goptions_platform');
    	$Result = $emReplicator->createQuery('SELECT COUNT(c) as ccount, CURRENT_TIMESTAMP() as time FROM Getresponse360ReplicatorBundle:Customer c')->getResult();
    	$total = $Result[0]['ccount']; //Total number of customers
    	$last = $Result[0]['time']; //Current timestamp
    	$this->Last = $last;

		$lastIdImported = ($Current % $total); //Current count of imported
		$Count = $Settings->getSize();
    	$query = $emReplicator->createQuery(
				'SELECT c.id as id
				FROM Getresponse360ReplicatorBundle:Customer c
				WHERE c.id  >= :lastIdImported
				AND c.regTime < :lastUpdated'
			) 
			->setParameter('lastIdImported', $lastIdImported)
			->setParameter('lastUpdated', $last)
			->setMaxResults($Count);

		$results2 = $query->getResult();
		foreach($results2 as $customerId) {
		$this->CID=$customerId['id']; //Set current customerId to use within val/val2

		if ($this->val(0)!=$this->val2(0)) { $this->update($this->val(0)); }
		else if ($this->val(1)!=$this->val2(1)) { $this->update($this->val(1)); }
		else if ($this->val(2)!=$this->val2(2)) { $this->update($this->val(2)); }
		else if ($this->val(3)!=$this->val2(3)) { $this->update($this->val(3)); }

		$this->NewCount=null; //Invalidate previous results from lazy initialization
		$this->SavedCount=null;
		$lastIdImported++;
		}
		$Settings->setLastUpdate(new \DateTime());
		$Settings->setCurrent($lastIdImported % $total);
		$SetManager->persist($Settings);
		$SetManager->flush();

		$results = array ("success"=>"1");
		echo "Success";
		exit(1);
        return array('name' => $results);
    }

    function update($InsertNew) //Update the entity in our local database (not the replicator) to check against the newest data to determine if we need to update getresponse360 with new data
    {
    	if ($InsertNew==-1)
    	{
    	//Create new SavedUser entity
    	$emReplicator=$this->getDoctrine()->getManager();
		$Saved = new MyEntities\SavedUser();
		$Saved->setId($this->CID);
		$Saved->setDepositCount(max($this->val2(0),0));
		$Saved->setPositionsCount(max($this->val2(1),0));
		$Saved->setWithdrawalCount(max($this->val2(2),0));
		$Saved->setUserHandler(max($this->val2(3),0));
		$emReplicator->persist($Saved);
		$emReplicator->flush();
		$this->GetResponse();
    	}
    	else
    	{
    	//Update existing SavedUser entity
    	$emReplicator=$this->getDoctrine()->getManager();
    	$customer = $emReplicator->getRepository(MyEntities\SavedUser)->findOneBy(array('id' => $this->CID));
    	$customer->setDepositCount(max($this->val2(0),0));
		$customer->setPositionsCount(max($this->val2(1),0));
		$customer->setWithdrawalCount(max($this->val2(2),0));
		$customer->setUserHandler(max($this->val2(3),0));
		$emReplicator->persist($customer);
		$emReplicator->flush();
		$this->GetResponse(false);
    	}
    }

    function GetResponse($New = true)
    {
   	$api_key = '06e7de6d3450318fee796313f7a6aaa1'; //Our API from the dashboard
   	$camp = '2'; //Campaign
    if (!isset($this->Client)) { $this->Client = new JsonRPCClient('http://api.getresponse360.com/goptions1'); } //Lazy initialization for communication with getresponse360

	$emReplicator = $this->getDoctrine()->getManager('goptions_platform'); //Our replicator database
    $Customer = $emReplicator->getRepository('Getresponse360\ReplicatorBundle\Entity\Customer')->findOneBy(array('id' => $this->CID)); //Fetch customer by ID

    //Set customs fields, they will be either used by set_contact_customs or add_contant, depending on whether the user exists or not (add_contact takes time to verify the user thus deleting and reinserting is not a viable option)
	$Customs = array (
            array( "name" => "phone", "content" => $Customer->getPhone()),
            array( "name" => "country", "content" => $Customer->getCountry()),
            array( "name" => "language", "content" => $Customer->getSiteLanguage()),
            array( "name" => "birth_date", "content" => $Customer->getBirthday()),
            array( "name" => "reg_date", "content" => $Customer->getRegTime()),
            array( "name" => "last_activity", "content" => $Customer->getLastTimeActive()),
            array( "name" => "last_login", "content" => $Customer->getLastLoginDate()),
            array( "name" => "last_balance", "content" => $Customer->getLastAccountBalance()),
            array( "name" => "last_withdrawal", "content" => ""),
            array( "name" => "last_deposit", "content" => ""), //verify these with delphine
            array( "name" => "bonus", "content" => "0"), //get bonus sum
            array( "name" => "idcustomer", "content" => $Customer->getId()),
            array( "name" => "employeeinchargeid", "content" => $Customer->getEmployeeInChargeId()),
            array( "name" => "account_type", "content" => $Customer->getAccountType()),
            array( "name" => "demo", "content" => $Customer->getIsDemo()),
            array( "name" => "suspended", "content" => $Customer->getIsSuspended())
    );

	if (!$New) //If the user alread exists we modify it (provided the actual data has changed), otherwise we add a new user
	{
	$result = $this->Client->set_contact_customs(
	    $api_key,
	    array (
	        "contact" => array ( "campaign" => $camp, "email" => $Customer->getEmail() ), //Email is not unique according to the API since the same email can exist across multiple campaigns but campaign+email is.
	        "customs" => $Customs
	    )
	);
	}
	else
	{
	$result = $this->Client->add_contact(
	    $api_key,
	    array (
	        "campaign" => $camp,
	        "name" => ($Customer->getFirstName()." ".$Customer->getLastName()),
	        "email" => $Customer->getEmail(),
	        "customs" => '[{"name": "name_1_value","content": "content_1_value"}]'
	    )
	);
	}
    }

    function val2($b) //Fetch deposit count, position count, withdrawal count, user handler from the replicator $b is an integer with 0 for "deposit count" and 3 for "user handler".
    {
    	$Arr[]="cC"; $Arr[]="pC"; $Arr[]="wC"; $Arr[]="uH";
    	$In=($Arr[$b]);
    	if (!isset($this->NewCount)) //Initialize the results for this customer if they don't exist.
    	{
    		$emReplicator=$this->getDoctrine()->getManager('goptions_platform');
    		$this->NewCount = $emReplicator->createQuery(
			'SELECT COUNT(c) as cC, 
			(SELECT COUNT(p) FROM Getresponse360ReplicatorBundle:Positions p WHERE p.customerId = :lastIdImported AND p.date < :lastUpdated) as pC, 
			(SELECT COUNT(w) FROM Getresponse360ReplicatorBundle:Withdrawal w WHERE w.customerId = :lastIdImported AND w.requestTime < :lastUpdated) as wC,
			(SELECT u.employeeInChargeId FROM Getresponse360ReplicatorBundle:Customer u WHERE u.id = :lastIdImported AND u.regTime < :lastUpdated) as uH 
			FROM Getresponse360ReplicatorBundle:CustomerDeposit c 
			WHERE c.customerId = :lastIdImported 
			AND c.requestTime < :lastUpdated')
		->setParameter('lastIdImported', $this->CID)
		->setParameter('lastUpdated', $this->Last)->getResult();
		}
		return $this->NewCount[0][$In];
	}

    function val($a) //Fetch deposit count, position count, withdrawal count, user handler from our local database to determine what data we have updated getresponse360 with previously, if nothing exists -1 is returned to create a new user.
    {
    	$Arr[]="dC"; $Arr[]="pC"; $Arr[]="wC"; $Arr[]="UID";
    	$In=($Arr[$a]);
    	if (!isset($this->SavedCount)) //Initialize the results for this customer if they don't exist.
    	{
    		$emReplicator=$this->getDoctrine()->getManager();
    		$this->SavedCount = $emReplicator->createQuery('SELECT s.depositCount as dC, s.withdrawalCount as wC, s.positionsCount as pC, s.userHandler as UID FROM Getresponse360GetresponseBundle:SavedUser s WHERE s.customerId = :customer')
			->setParameter('customer', $this->CID)->getResult();
		}
		if (isset($this->SavedCount[0][$In])) {return $this->SavedCount[0][$In];} else {return -1;} //Return the value or -1 to create a new user if it doesn't exist

    }
}
