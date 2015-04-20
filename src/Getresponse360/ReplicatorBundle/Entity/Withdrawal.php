<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Withdrawal
 *
 * @ORM\Table(name="withdrawals")
 * @ORM\Entity
 */
class Withdrawal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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
     * @ORM\Column(name="creditCardUserId", type="integer")
     */
    private $creditCardUserId;

    /**
     * @var float
     *
     * @ORM\Column(name="amount", type="float")
     */
    private $amount;

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
     * @var string
     *
     * @ORM\Column(name="cancelReason", type="string", length=500)
     */
    private $cancelReason;

    /**
     * @var integer
     *
     * @ORM\Column(name="receptionEmployeeId", type="integer")
     */
    private $receptionEmployeeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="processEmployeeId", type="integer")
     */
    private $processEmployeeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="customerId", type="integer")
     */
    private $customerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="campaignId", type="integer")
     */
    private $campaignId;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="clearingUserID", type="integer")
     */
    private $clearingUserID;

    /**
     * @var string
     *
     * @ORM\Column(name="clearedBy", type="string", length=64)
     */
    private $clearedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdateDate", type="datetime")
     */
    private $lastUpdateDate;

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
    public function setCustomer(\Getresponse360\ReplicatorBundle\Entity\customers $customer = null)
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
     * @return Withdraw
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
     * Set creditCardUserId
     *
     * @param integer $creditCardUserId
     * @return Withdraw
     */
    public function setCreditCardUserId($creditCardUserId)
    {
        $this->creditCardUserId = $creditCardUserId;

        return $this;
    }

    /**
     * Get creditCardUserId
     *
     * @return integer 
     */
    public function getCreditCardUserId()
    {
        return $this->creditCardUserId;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Withdraw
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
     * Set requestTime
     *
     * @param \DateTime $requestTime
     * @return Withdraw
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
     * @return Withdraw
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
     * @return Withdraw
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
     * @return Withdraw
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
     * Set currency
     *
     * @param integer $currency
     * @return Withdraw
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
     * @return Withdraw
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
     * @return Withdraw
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
     * Set cancelReason
     *
     * @param string $cancelReason
     * @return Withdraw
     */
    public function setCancelReason($cancelReason)
    {
        $this->cancelReason = $cancelReason;

        return $this;
    }

    /**
     * Get cancelReason
     *
     * @return string 
     */
    public function getCancelReason()
    {
        return $this->cancelReason;
    }

    /**
     * Set receptionEmployeeId
     *
     * @param integer $receptionEmployeeId
     * @return Withdraw
     */
    public function setReceptionEmployeeId($receptionEmployeeId)
    {
        $this->receptionEmployeeId = $receptionEmployeeId;

        return $this;
    }

    /**
     * Get receptionEmployeeId
     *
     * @return integer 
     */
    public function getReceptionEmployeeId()
    {
        return $this->receptionEmployeeId;
    }

    /**
     * Set processEmployeeId
     *
     * @param integer $processEmployeeId
     * @return Withdraw
     */
    public function setProcessEmployeeId($processEmployeeId)
    {
        $this->processEmployeeId = $processEmployeeId;

        return $this;
    }

    /**
     * Get processEmployeeId
     *
     * @return integer 
     */
    public function getProcessEmployeeId()
    {
        return $this->processEmployeeId;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return Withdraw
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
     * Set campaignId
     *
     * @param integer $campaignId
     * @return Withdraw
     */
    public function setCampaignId($campaignId)
    {
        $this->campaignId = $campaignId;

        return $this;
    }

    /**
     * Get campaignId
     *
     * @return integer 
     */
    public function getCampaignId()
    {
        return $this->campaignId;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Withdraw
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set clearingUserID
     *
     * @param integer $clearingUserID
     * @return Withdraw
     */
    public function setClearingUserID($clearingUserID)
    {
        $this->clearingUserID = $clearingUserID;

        return $this;
    }

    /**
     * Get clearingUserID
     *
     * @return integer 
     */
    public function getClearingUserID()
    {
        return $this->clearingUserID;
    }

    /**
     * Set clearedBy
     *
     * @param string $clearedBy
     * @return Withdraw
     */
    public function setClearedBy($clearedBy)
    {
        $this->clearedBy = $clearedBy;

        return $this;
    }

    /**
     * Get clearedBy
     *
     * @return string 
     */
    public function getClearedBy()
    {
        return $this->clearedBy;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return Withdraw
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }

    /**
     * Get lastUpdateDate
     *
     * @return \DateTime 
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }
}
