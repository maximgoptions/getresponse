<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CustomerDeposit
 *
 * @ORM\Table(name="customer_deposits")
 * @ORM\Entity
 */
class CustomerDeposit
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")\
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="paymentMethod", type="integer")
     */
    private $paymentMethod;

    /**
     * @var integer
     *
     * @ORM\Column(name="customerId", type="integer")
     */
    private $customerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="clearBy", type="integer")
     */
    private $clearBy;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

    /**
     * @var integer
     *
     * @ORM\Column(name="currency", type="integer")
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="rateUSD", type="decimal")
     */
    private $rateUSD;

    /**
     * @var float
     *
     * @ORM\Column(name="amountUSD", type="float")
     */
    private $amountUSD;

    /**
     * @var float
     *
     * @ORM\Column(name="leverage", type="float")
     */
    private $leverage;

    /**
     * @var string
     *
     * @ORM\Column(name="IPAddress", type="string", length=16)
     */
    private $iPAddress;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="requestTime", type="datetime")
     */
    private $requestTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="confirmTime", type="datetime")
     */
    private $confirmTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="cancellationTime", type="datetime")
     */
    private $cancellationTime;

    /**
     * @var string
     *
     * @ORM\Column(name="bonusActPoint", type="decimal")
     */
    private $bonusActPoint;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bonusActivationDate", type="datetime")
     */
    private $bonusActivationDate;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Getresponse360\ReplicatorBundle\Entity\Customer", inversedBy="deposits")
     * @ORM\JoinColumn(name="customerid", referencedColumnName="id")
     */
    private $customer;


    /**
     * Set customer
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Customer $customer
     * @return CustomerDeposit
     */
    public function setCustomer(\Getresponse360\ReplicatorBundle\Entity\Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

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
     * Set paymentMethod
     *
     * @param integer $paymentMethod
     * @return Deposit
     */
    public function setPaymentMethod($paymentMethod)
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    /**
     * Get paymentMethod
     *
     * @return integer 
     */
    public function getPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return Deposit
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return integer 
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set clearBy
     *
     * @param integer $clearBy
     * @return Deposit
     */
    public function setClearBy($clearBy)
    {
        $this->clearBy = $clearBy;

        return $this;
    }

    /**
     * Get clearBy
     *
     * @return integer 
     */
    public function getClearBy()
    {
        return $this->clearBy;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Deposit
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currency
     *
     * @param integer $currency
     * @return Deposit
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
     * Set rateUSD
     *
     * @param string $rateUSD
     * @return Deposit
     */
    public function setRateUSD($rateUSD)
    {
        $this->rateUSD = $rateUSD;

        return $this;
    }

    /**
     * Get rateUSD
     *
     * @return string 
     */
    public function getRateUSD()
    {
        return $this->rateUSD;
    }

    /**
     * Set amountUSD
     *
     * @param float $amountUSD
     * @return Deposit
     */
    public function setAmountUSD($amountUSD)
    {
        $this->amountUSD = $amountUSD;

        return $this;
    }

    /**
     * Get amountUSD
     *
     * @return float 
     */
    public function getAmountUSD()
    {
        return $this->amountUSD;
    }

    /**
     * Set leverage
     *
     * @param float $leverage
     * @return Deposit
     */
    public function setLeverage($leverage)
    {
        $this->leverage = $leverage;

        return $this;
    }

    /**
     * Get leverage
     *
     * @return float 
     */
    public function getLeverage()
    {
        return $this->leverage;
    }

    /**
     * Set iPAddress
     *
     * @param string $iPAddress
     * @return Deposit
     */
    public function setIPAddress($iPAddress)
    {
        $this->iPAddress = $iPAddress;

        return $this;
    }

    /**
     * Get iPAddress
     *
     * @return string 
     */
    public function getIPAddress()
    {
        return $this->iPAddress;
    }

    /**
     * Set requestTime
     *
     * @param \DateTime $requestTime
     * @return Deposit
     */
    public function setRequestTime($requestTime)
    {
        $this->requestTime = $requestTime;

        return $this;
    }

    /**
     * Get requestTime
     *
     * @return \DateTime 
     */
    public function getRequestTime()
    {
        return $this->requestTime;
    }

    /**
     * Set confirmTime
     *
     * @param \DateTime $confirmTime
     * @return Deposit
     */
    public function setConfirmTime($confirmTime)
    {
        $this->confirmTime = $confirmTime;

        return $this;
    }

    /**
     * Get confirmTime
     *
     * @return \DateTime 
     */
    public function getConfirmTime()
    {
        return $this->confirmTime;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Deposit
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set cancellationTime
     *
     * @param \DateTime $cancellationTime
     * @return Deposit
     */
    public function setCancellationTime($cancellationTime)
    {
        $this->cancellationTime = $cancellationTime;

        return $this;
    }

    /**
     * Get cancellationTime
     *
     * @return \DateTime 
     */
    public function getCancellationTime()
    {
        return $this->cancellationTime;
    }

    /**
     * Set bonusActPoint
     *
     * @param string $bonusActPoint
     * @return Deposit
     */
    public function setBonusActPoint($bonusActPoint)
    {
        $this->bonusActPoint = $bonusActPoint;

        return $this;
    }

    /**
     * Get bonusActPoint
     *
     * @return string 
     */
    public function getBonusActPoint()
    {
        return $this->bonusActPoint;
    }

    /**
     * Set bonusActivationDate
     *
     * @param \DateTime $bonusActivationDate
     * @return Deposit
     */
    public function setBonusActivationDate($bonusActivationDate)
    {
        $this->bonusActivationDate = $bonusActivationDate;

        return $this;
    }

    /**
     * Get bonusActivationDate
     *
     * @return \DateTime 
     */
    public function getBonusActivationDate()
    {
        return $this->bonusActivationDate;
    }
}
