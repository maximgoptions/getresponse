<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * positions
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class positions
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
     * @ORM\Column(name="leveratePositionId", type="integer")
     */
    private $leveratePositionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="customerId", type="integer")
     */
    private $customerId;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal")
     */
    private $rate;

    /**
     * @var integer
     *
     * @ORM\Column(name="optionId", type="integer")
     */
    private $optionId;

    /**
     * @var string
     *
     * @ORM\Column(name="originalRate", type="decimal")
     */
    private $originalRate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="originalRateTimestamp", type="datetime")
     */
    private $originalRateTimestamp;

    /**
     * @var float
     *
     * @ORM\Column(name="payout", type="float")
     */
    private $payout;

    /**
     * @var string
     *
     * @ORM\Column(name="amount", type="decimal")
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
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var integer
     *
     * @ORM\Column(name="sourcePlatform", type="integer")
     */
    private $sourcePlatform;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdateDate", type="datetime")
     */
    private $lastUpdateDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="opmultiplier", type="smallint")
     */
    private $opmultiplier;


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
     * Set leveratePositionId
     *
     * @param integer $leveratePositionId
     * @return Position
     */
    public function setLeveratePositionId($leveratePositionId)
    {
        $this->leveratePositionId = $leveratePositionId;

        return $this;
    }

    /**
     * Get leveratePositionId
     *
     * @return integer 
     */
    public function getLeveratePositionId()
    {
        return $this->leveratePositionId;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Position
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set customerId
     *
     * @param integer $customerId
     * @return Position
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
     * Set rate
     *
     * @param string $rate
     * @return Position
     */
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get rate
     *
     * @return string 
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set optionId
     *
     * @param integer $optionId
     * @return Position
     */
    public function setOptionId($optionId)
    {
        $this->optionId = $optionId;

        return $this;
    }

    /**
     * Get optionId
     *
     * @return integer 
     */
    public function getOptionId()
    {
        return $this->optionId;
    }

    /**
     * Set originalRate
     *
     * @param string $originalRate
     * @return Position
     */
    public function setOriginalRate($originalRate)
    {
        $this->originalRate = $originalRate;

        return $this;
    }

    /**
     * Get originalRate
     *
     * @return string 
     */
    public function getOriginalRate()
    {
        return $this->originalRate;
    }

    /**
     * Set originalRateTimestamp
     *
     * @param \DateTime $originalRateTimestamp
     * @return Position
     */
    public function setOriginalRateTimestamp($originalRateTimestamp)
    {
        $this->originalRateTimestamp = $originalRateTimestamp;

        return $this;
    }

    /**
     * Get originalRateTimestamp
     *
     * @return \DateTime 
     */
    public function getOriginalRateTimestamp()
    {
        return $this->originalRateTimestamp;
    }

    /**
     * Set payout
     *
     * @param float $payout
     * @return Position
     */
    public function setPayout($payout)
    {
        $this->payout = $payout;

        return $this;
    }

    /**
     * Get payout
     *
     * @return float 
     */
    public function getPayout()
    {
        return $this->payout;
    }

    /**
     * Set amount
     *
     * @param string $amount
     * @return Position
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return string 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set currency
     *
     * @param integer $currency
     * @return Position
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
     * @return Position
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
     * Set status
     *
     * @param integer $status
     * @return Position
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
     * Set sourcePLatform
     *
     * @param integer $sourcePlatform
     * @return Position
     */
    public function setSourcePlatform($sourcePlatform)
    {
        $this->sourcePlatform = $sourcePlatform;

        return $this;
    }

    /**
     * Get sourcePLatform
     *
     * @return integer 
     */
    public function getSourcePLatform()
    {
        return $this->sourcePLatform;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Position
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return Position
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

    /**
     * Set opmultiplier
     *
     * @param integer $opmultiplier
     * @return Position
     */
    public function setOpmultiplier($opmultiplier)
    {
        $this->opmultiplier = $opmultiplier;

        return $this;
    }

    /**
     * Get opmultiplier
     *
     * @return integer 
     */
    public function getOpmultiplier()
    {
        return $this->opmultiplier;
    }
}
