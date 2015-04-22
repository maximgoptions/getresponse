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
    	 //em = $this->getDoctrine()->getManager();
    	$SetManager = $this->getDoctrine()->getManager();
    	$Settings = $SetManager->getRepository('Getresponse360\GetresponseBundle\Entity\Settings')->findOneBy(array('id' => '0')); //getAny()->getOneOrNullResult();
    	$Current = $Settings->getCurrent();
    	$emReplicator = $this->getDoctrine()->getManager('goptions_platform');
    	$Result = $emReplicator->createQuery('SELECT COUNT(c) as ccount, CURRENT_TIMESTAMP() as time FROM Getresponse360ReplicatorBundle:Customer c')->getResult();
    	$total = $Result[0]['ccount']; //fetch gcount
    	$last = $Result[0]['time'];
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
			->setMaxResults(50);

		$results2 = $query->getResult();
		foreach($results2 as $customerId) {
		$this->CID=$customerId['id'];

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
		//echo "<pre>";	
		//var_dump($query->getResult());
		//echo "</pre>";	
		dump(count($results2));
		exit();
		//$results = $query->getResult();

        return array('name' => $results);
    }

    function update($InsertNew)
    {
    	if ($InsertNew==-1)
    	{
    	//Create new entity
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
    	//Update existing entity
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
   	$api_key = '2ba6eb57e29d4034b35f1b8755ab0700'; //Our API from the dashboard
   	$camp = 'VzzHx'; //Campaign
    if (!isset($this->Client)) { $this->Client = new JsonRPCClient('http://api.getresponse360.com/goptions1'); } //Lazy initialization for communication with getresponse360

	$emReplicator = $this->getDoctrine()->getManager('goptions_platform');
    $Customer = $emReplicator->getRepository('Getresponse360\ReplicatorBundle\Entity\Customer')->findOneBy(array('id' => $this->CID));

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
	        "contact" => array ( "campaign" => $camp, "email" => $Customer->getEmail() ),
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
	        "first_name" => $Customer->getFirstName(),
	        "last_name" => $Customer->getLastName(),
	        "email" => $Customer->getEmail(),
	        "customs" => $Customs
	    )
	);
	}
	dump($result);
	exit();
/*
	first name
last name
email address
phone
Country
language
birth date
registration date
last time activity
last time login
last balance
last withdrawal
last deposit
bonus
idcustomer
employeeinchargeid
account type
demo 
suspended

	# add contact to the campaign
	$result = $this->Client->add_contact(
		$api_key,
		array (
			'campaign'  => 'VzzHx', //Campaign token, no need to waste calls fetching this staic property
	    	
			# basic info
			'name'      => 'Test',
	    	'email'     => 'test@test.test',

			# custom fields
			'customs' => array(
		        array(
		            'name'       => 'likes_to_drink',
		            'content'    => 'tea'
		        ),
				array(
		            'name'       => 'likes_to_eat',
		            'content'    => 'steak'
		        )
		    )
		)
	);*/
    }

    function val2($b) //Deposit count, position count, withdrawal count, user handler
    {
    	$Arr[]="cC"; $Arr[]="pC"; $Arr[]="wC"; $Arr[]="uH";
    	$In=($Arr[$b]);
    	if (!isset($this->NewCount)) 
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

    function val($a)
    {
    	$Arr[]="dC"; $Arr[]="pC"; $Arr[]="wC"; $Arr[]="UID";
    	$In=($Arr[$a]);
    	if (!isset($this->SavedCount)) //SavedUser
    	{
    		$emReplicator=$this->getDoctrine()->getManager();
    		$this->SavedCount = $emReplicator->createQuery('SELECT s.depositCount as dC, s.withdrawalCount as wC, s.positionsCount as pC, s.userHandler as UID FROM Getresponse360GetresponseBundle:SavedUser s WHERE s.customerId = :customer')
			->setParameter('customer', $this->CID)->getResult();
		}
		//dump($this->SavedCount);
		//return $this->SavedCount;
		if (isset($this->SavedCount[0][$In])) {return $this->SavedCount[0][$In];} else {return -1;}

    	//global $Test;
    	//dump($this->Test);
    	/*global $valResults;
    	global $emReplicator;
    	dump($emReplicator);
    	if (!isset($valResults)) { $valResults=0; $emReplicator->createQuery('SELECT COUNT(c) as ccount, CURRENT_TIMESTAMP() as time FROM Getresponse360ReplicatorBundle:Customer c')->getResult(); } //Lazy initizaltion
    	$valResults++;
    	return $valResults;*/
    }

    /**
	* Get from replicator 500 results each time
	*/
	public function getTableFromReplicator($lastIdImported, $tableName) {
		$emReplicator = $this->getDoctrine()->getManager('goptions_platform');
		if($tableName == 'CustomerBalance') { 
			// if entity name is CustomerBalance
			$query = $emReplicator->createQuery(
				'SELECT d FROM Getresponse360ReplicatorBundle:'.$tableName.' d
				WHERE d.customerid  >= :lastIdImported
				ORDER BY d.customerid ASC'
			) 
			->setParameter('lastIdImported', $lastIdImported)
			->setMaxResults(500);
		}
		else { 
			$query = $emReplicator->createQuery(
				'SELECT d FROM Getresponse360ReplicatorBundle:'.$tableName.' d
				WHERE d.customerId  >= :lastIdImported
				ORDER BY d.customerId ASC'
			) 
			->setParameter('lastIdImported', $lastIdImported)
			->setMaxResults(500);

		}

		
		$results = $query->getResult();

		return $results;
	}
}
