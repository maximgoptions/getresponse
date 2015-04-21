<?php

namespace Getresponse360\GetresponseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SavedUser
 *
 * @ORM\Table(name="last_updated")
 * @ORM\Entity
 */
class SavedUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customer_id", type="integer")
     * @ORM\Id
     */
    private $customerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="deposit_count", type="integer")
     */
    private $depositCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="withdrawal_count", type="integer")
     */
    private $withdrawalCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="positions_count", type="integer")
     */
    private $positionsCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_handler", type="integer")
     */
    private $userHandler;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->customerId;
    }

     /**
     * Set id
     *
     * @return integer 
     */
    public function setId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Set depositCount
     *
     * @param integer $depositCount
     * @return SavedUser
     */
    public function setDepositCount($depositCount)
    {
        $this->depositCount = $depositCount;

        return $this;
    }

    /**
     * Get depositCount
     *
     * @return integer 
     */
    public function getDepositCount()
    {
        return $this->depositCount;
    }

    /**
     * Set withdrawalCount
     *
     * @param integer $withdrawalCount
     * @return SavedUser
     */
    public function setWithdrawalCount($withdrawalCount)
    {
        $this->withdrawalCount = $withdrawalCount;

        return $this;
    }

    /**
     * Get withdrawalCount
     *
     * @return integer 
     */
    public function getWithdrawalCount()
    {
        return $this->withdrawalCount;
    }

    /**
     * Set positionsCount
     *
     * @param integer $positionsCount
     * @return SavedUser
     */
    public function setPositionsCount($positionsCount)
    {
        $this->positionsCount = $positionsCount;

        return $this;
    }

    /**
     * Get positionsCount
     *
     * @return integer 
     */
    public function getPositionsCount()
    {
        return $this->positionsCount;
    }

    /**
     * Set userHandler
     *
     * @param integer $userHandler
     * @return SavedUser
     */
    public function setUserHandler($userHandler)
    {
        $this->userHandler = $userHandler;

        return $this;
    }

    /**
     * Get userHandler
     *
     * @return integer 
     */
    public function getUserHandler()
    {
        return $this->userHandler;
    }
}
