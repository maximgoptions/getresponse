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
    /**
     * @Route("/test")
     * @Template()
     */ //Getresponse360\ReplicatorBundle\Entity\customer_balance
    public function indexAction()
    {
    	 //em = $this->getDoctrine()->getManager();
    	$results = $this->getDoctrine()->getManager()->getRepository('Getresponse360\GetresponseBundle\Entity\Settings')->findOneBy(array('id' => '0')); //getAny()->getOneOrNullResult();

    	$emReplicator = $this->getDoctrine()->getManager('goptions_platform');
    	$total = $emReplicator->createQuery('SELECT COUNT(o) as gcount FROM Getresponse360ReplicatorBundle:Positions o')->getSingleScalarResult();

		$lastIdImported = ($results->getCurrent() % $total); //Current count of imported
		//echo $lastIdImported;
		$Count = $results->getSize();
    	$query = $emReplicator->createQuery(
				'SELECT o.id as optionId, p.id as positionId, a.id
				FROM Getresponse360ReplicatorBundle:Positions o
				LEFT JOIN o.option p
				LEFT JOIN p.assets a
				WHERE o.id  >= :lastIdImported'
			) 
			->setParameter('lastIdImported', $lastIdImported)
			->setMaxResults($Count);
		//ORDER BY d.id ASC

		$results2 = $query->getResult();

		$results->setLastUpdate(new \DateTime());
		$results->setCurrent(($lastIdImported+count($results2)) % $total);
		//echo "<pre>";	
		//var_dump($query->getResult());
		//echo "</pre>";	
		dump(count($results2));
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
