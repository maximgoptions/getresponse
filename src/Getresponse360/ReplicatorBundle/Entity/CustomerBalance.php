<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerBalance
 *
 * @ORM\Table(name="customer_balance")
 * @ORM\Entity
 */
class CustomerBalance
{
    /**
     * @var integer
     *
     * @ORM\Column(name="customerId", type="integer")
     * @ORM\Id
     */
    private $customerId;

    /**
     * @var float
     *
     * @ORM\Column(name="lastBalance", type="float")
     */
    private $lastBalance;

    /**
     * @var float
     *
     * @ORM\Column(name="pnl", type="float")
     */
    private $pnl;

    /**
     * @var integer
     *
     * @ORM\Column(name="currency", type="integer")
     */
    private $currency;

    /**
     * @var integer
     *
     * @ORM\Column(name="isDemo", type="smallint")
     */
    private $isDemo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdate", type="datetime")
     */
    private $lastUpdate;

    /**
     * @var boolean
     *
     * @ORM\OneToMany(targetEntity="Getresponse360\ReplicatorBundle\Entity\Customer", mappedBy="user")
     */
    private $customer;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get customerId
     *
     * @return float 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set lastBalance
     *
     * @param float $lastBalance
     * @return Balance
     */
    public function setLastBalance($lastBalance)
    {
        $this->lastBalance = $lastBalance;

        return $this;
    }

    /**
     * Get lastBalance
     *
     * @return float 
     */
    public function getLastBalance()
    {
        return $this->lastBalance;
    }

    /**
     * Set pnl
     *
     * @param float $pnl
     * @return Balance
     */
    public function setPnl($pnl)
    {
        $this->pnl = $pnl;

        return $this;
    }

    /**
     * Get pnl
     *
     * @return float 
     */
    public function getPnl()
    {
        return $this->pnl;
    }

    /**
     * Set currency
     *
     * @param integer $currency
     * @return Balance
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return integer 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set isDemo
     *
     * @param integer $isDemo
     * @return Balance
     */
    public function setIsDemo($isDemo)
    {
        $this->isDemo = $isDemo;

        return $this;
    }

    /**
     * Get isDemo
     *
     * @return integer 
     */
    public function getIsDemo()
    {
        return $this->isDemo;
    }

    /**
     * Set lastUpdate
     *
     * @param \DateTime $lastUpdate
     * @return Balance
     */
    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;

        return $this;
    }

    /**
     * Get lastUpdate
     *
     * @return \DateTime 
     */
    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    /**
     * Add customer
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Customer $customer
     * @return User
     */
    public function addCustomer(\Getresponse360\ReplicatorBundle\Entity\Customer $customer)
    {
        $this->customer[] = $customer;

        return $this;
    }

    /**
     * Remove customer
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Customer $customer
     */
    public function removeCustomer(\Getresponse360\ReplicatorBundle\Entity\Customer $customer)
    {
        $this->customer->removeElement($customer);
    }

    /**
     * Get customer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
