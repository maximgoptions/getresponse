<?php

namespace Getresponse360\GetresponseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Getresponse360\GetresponseBundle\Services\JsonRPCClient;
use Getresponse360\ReplicatorBundle\Entity;
use Getresponse360\ReplicatorBundle\Services;
//use Getresponse360\GetresponseBundle\Entity as E2N;

class DefaultController extends Controller
{
	private $NewCount = null;
    /**
     * @Route("/test")
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
    	$lastUpdated = $Result[0]['time'];

		$lastIdImported = ($Current % $total); //Current count of imported
		$Count = $Settings->getSize();
    	$query = $emReplicator->createQuery(
				'SELECT c.id as id
				FROM Getresponse360ReplicatorBundle:Customer c
				WHERE c.id  >= :lastIdImported
				AND c.regTime < :lastUpdated'
			) 
			->setParameter('lastIdImported', $lastIdImported)
			->setParameter('lastUpdated', $lastUpdated)
			->setMaxResults(50);

		$results2 = $query->getResult();
		foreach($results2 as $customerId) {
		$CID=$customerId['id'];

		dump($this->val2(0));
		dump($this->val2(1));
		dump($this->val2(2));
		//if ($this->val(0)!=$ResultC[0]["dC"]) { $this->update(); }
		//else if ($this->val(1)!=$ResultC[1]["pC"]) { $this->update(); }
		//else if ($this->val(1)!=$ResultC[1]["wC"]) { $this->update(); }
		//dump($ResultC);
		//$this->val(0);
		//if (!find()) {update();}
		//if (val(0)!=c)
		$lastIdImported++;
		}
		$Settings->setLastUpdate(new \DateTime());
		$Settings->setCurrent($lastIdImported % $total);
		$SetManager->persist($Settings);
		$SetManager->flush();
		//echo "<pre>";	
		//var_dump($query->getResult());
		//echo "</pre>";	
		//dump(count($results2));
		exit();
		//$results = $query->getResult();

        return array('name' => $results);
    }

    function update()
    {
    	//global;

    }

    function val2($b)
    {
    	if (!isset($this->NewCount)) 
    	{
    		$this->NewCount = $emReplicator->createQuery(
			'SELECT COUNT(c) as dC, 
			(SELECT COUNT(p) FROM Getresponse360ReplicatorBundle:Positions p WHERE p.customerId = :lastIdImported AND p.date < :lastUpdated) as pC, 
			(SELECT COUNT(w) FROM Getresponse360ReplicatorBundle:Withdrawal w WHERE w.customerId = :lastIdImported AND w.requestTime < :lastUpdated) as wC
			FROM Getresponse360ReplicatorBundle:CustomerDeposit c 
			WHERE c.customerId = :lastIdImported 
			AND c.requestTime < :lastUpdated')
		->setParameter('lastIdImported', $CID)
		->setParameter('lastUpdated', $lastUpdated)->getResult();
		}
		return $this->m                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     NewCount[0][$b];
    }

    function val($a)
    {
    	//global $Test;
    	dump($this->Test);
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
