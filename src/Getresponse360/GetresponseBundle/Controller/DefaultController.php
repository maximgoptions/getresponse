<?php

namespace Getresponse360\GetresponseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Getresponse360\GetresponseBundle\Services\JsonRPCClient;
use Getresponse360\ReplicatorBundle\Entity;
use Getresponse360\ReplicatorBundle\Services;

class DefaultController extends Controller
{
    /**
     * @Route("/test")
     * @Template()
     */ //Getresponse360\ReplicatorBundle\Entity\customer_balance
    public function indexAction()
    {
    	 //em = $this->getDoctrine()->getManager();
    	 //$results = $this->getDoctrine()->getRepository('Getresponse360UserBundle:user')->findById('2');
    	 //print_r($results);
    	 //exit();

		$lastIdImported = 2;
		$depositID = 10;
    	$emReplicator = $this->getDoctrine()->getManager('goptions_platform');
    	$query = $emReplicator->createQuery(
				'SELECT c.id as customerId, d.lastBalance as balance FROM Getresponse360ReplicatorBundle:Customer c
				LEFT JOIN c.customerbalance d
				WHERE c.id  = :lastIdImported'
			) 
			->setParameter('lastIdImported', $lastIdImported)
			//->setParameter('depositID', $depositID)
			->setMaxResults(100);
		//ORDER BY d.id ASC

		//echo "<pre>";	
		//var_dump($query->getResult());
		//echo "</pre>";	
		dump($query->getResult());
		exit();
		$results = $query->getResult();

        return array('name' => $results);
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
