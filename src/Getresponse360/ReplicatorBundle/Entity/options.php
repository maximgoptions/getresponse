<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Options
 *
 * @ORM\Table(name="options")
 * @ORM\Entity
 */
class Options
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="positions")
     * @ORM\JoinColumn(name="id", referencedColumnName="optionId")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="assetId", type="integer")
     */
    private $assetId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ownedBy", type="integer")
     */
    private $ownedBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="profit", type="smallint")
     */
    private $profit;

    /**
     * @var integer
     *
     * @ORM\Column(name="loss", type="smallint")
     */
    private $loss;

    /**
     * @var integer
     *
     * @ORM\Column(name="multiplier", type="smallint")
     */
    private $multiplier;

    /**
     * @var integer
     *
     * @ORM\Column(name="noPositionTime", type="smallint")
     */
    private $noPositionTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="lastPositionTime", type="smallint")
     */
    private $lastPositionTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="noRolloverTime", type="smallint")
     */
    private $noRolloverTime;

    /**
     * @var string
     *
     * @ORM\Column(name="endRate", type="decimal")
     */
    private $endRate;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var string
     *
     * @ORM\Column(name="endTradePrice", type="decimal")
     */
    private $endTradePrice;

    /**
     * @var integer
     *
     * @ORM\Column(name="priceTick", type="integer")
     */
    private $priceTick;

    /**
     * @var integer
     *
     * @ORM\Column(name="color", type="smallint")
     */
    private $color;

    /**
     * @var integer
     *
     * @ORM\Column(name="ruleId", type="integer")
     */
    private $ruleId;

    /**
     * @var integer
     *
     * @ORM\Column(name="callPositionsNum", type="smallint")
     */
    private $callPositionsNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="putPositionsNum", type="smallint")
     */
    private $putPositionsNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="callPositionsAmount", type="integer")
     */
    private $callPositionsAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="putPositionsAmount", type="integer")
     */
    private $putPositionsAmount;

    /**
     * @var integer
     *
     * @ORM\Column(name="suspended", type="smallint")
     */
    private $suspended;

    /**
     * @var string
     *
     * @ORM\Column(name="pricePer", type="decimal")
     */
    private $pricePer;

    /**
     * @var integer
     *
     * @ORM\Column(name="sixtySeconds", type="smallint")
     */
    private $sixtySeconds;

    /**
     * @var integer
     *
     * @ORM\Column(name="maxBuyOutTime", type="smallint")
     */
    private $maxBuyOutTime;

    /**
     * @var integer
     *
     * @ORM\Column(name="bmoSuspended", type="smallint")
     */
    private $bmoSuspended;

    /**
     * @var integer
     *
     * @ORM\Column(name="optionType", type="integer")
     */
    private $optionType;

    /**
     * @var integer
     *
     * @ORM\Column(name="VIPGroup", type="integer")
     */
    private $vIPGroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="isWeekendOption", type="smallint")
     */
    private $isWeekendOption;

    /**
     * @var string
     *
     * @ORM\Column(name="goalRate", type="decimal")
     */
    private $goalRate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdateDate", type="datetime")
     */
    private $lastUpdateDate;

    /**
     * @var boolean
     *
     * @ORM\OneToMany(targetEntity="Getresponse360\ReplicatorBundle\Entity\Positions", mappedBy="option")
     */
    private $positions;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Getresponse360\ReplicatorBundle\Entity\Options", inversedBy="options")
     * @ORM\JoinColumn(name="assetId", referencedColumnName="id")
     */
    private $assets;

    /**
     * Add positions
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Positions $positions
     * @return Customer
     */
    public function addPositions(\Getresponse360\ReplicatorBundle\Entity\Positions $positions)
    {
        $this->positions[] = $positions;

        return $this;
    }

    /**
     * Remove positions
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Positions $positions
     */
    public function removePositions(\Getresponse360\ReplicatorBundle\Entity\Positions $positions)
    {
        $this->positions->removeElement($positions);
    }

    /**
     * Get positions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPositions()
    {
        return $this->positions;
    }

    /**
     * Add positions
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Positions $positions
     * @return Customer
     */
    public function addPosition(\Getresponse360\ReplicatorBundle\Entity\Positions $positions)
    {
        $this->positions[] = $positions;

        return $this;
    }

    /**
     * Remove positions
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Positions $positions
     */
    public function removePosition(\Getresponse360\ReplicatorBundle\Entity\Positions $positions)
    {
        $this->positions->removeElement($positions);
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
     * Set assetId
     *
     * @param integer $assetId
     * @return BinaryOption
     */
    public function setAssetId($assetId)
    {
        $this->assetId = $assetId;

        return $this;
    }

    /**
     * Get assetId
     *
     * @return integer 
     */
    public function getAssetId()
    {
        return $this->assetId;
    }

    /**
     * Set ownedBy
     *
     * @param integer $ownedBy
     * @return BinaryOption
     */
    public function setOwnedBy($ownedBy)
    {
        $this->ownedBy = $ownedBy;

        return $this;
    }

    /**
     * Get ownedBy
     *
     * @return integer 
     */
    public function getOwnedBy()
    {
        return $this->ownedBy;
    }

    /**
     * Set startDate
     *
     * @param \DateTime $startDate
     * @return BinaryOption
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate
     *
     * @return \DateTime 
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate
     *
     * @param \DateTime $endDate
     * @return BinaryOption
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate
     *
     * @return \DateTime 
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set profit
     *
     * @param integer $profit
     * @return BinaryOption
     */
    public function setProfit($profit)
    {
        $this->profit = $profit;

        return $this;
    }

    /**
     * Get profit
     *
     * @return integer 
     */
    public function getProfit()
    {
        return $this->profit;
    }

    /**
     * Set loss
     *
     * @param integer $loss
     * @return BinaryOption
     */
    public function setLoss($loss)
    {
        $this->loss = $loss;

        return $this;
    }

    /**
     * Get loss
     *
     * @return integer 
     */
    public function getLoss()
    {
        return $this->loss;
    }

    /**
     * Set multiplier
     *
     * @param integer $multiplier
     * @return BinaryOption
     */
    public function setMultiplier($multiplier)
    {
        $this->multiplier = $multiplier;

        return $this;
    }

    /**
     * Get multiplier
     *
     * @return integer 
     */
    public function getMultiplier()
    {
        return $this->multiplier;
    }

    /**
     * Set noPositionTime
     *
     * @param integer $noPositionTime
     * @return BinaryOption
     */
    public function setNoPositionTime($noPositionTime)
    {
        $this->noPositionTime = $noPositionTime;

        return $this;
    }

    /**
     * Get noPositionTime
     *
     * @return integer 
     */
    public function getNoPositionTime()
    {
        return $this->noPositionTime;
    }

    /**
     * Set lastPositionTime
     *
     * @param integer $lastPositionTime
     * @return BinaryOption
     */
    public function setLastPositionTime($lastPositionTime)
    {
        $this->lastPositionTime = $lastPositionTime;

        return $this;
    }

    /**
     * Get lastPositionTime
     *
     * @return integer 
     */
    public function getLastPositionTime()
    {
        return $this->lastPositionTime;
    }

    /**
     * Set noRolloverTime
     *
     * @param integer $noRolloverTime
     * @return BinaryOption
     */
    public function setNoRolloverTime($noRolloverTime)
    {
        $this->noRolloverTime = $noRolloverTime;

        return $this;
    }

    /**
     * Get noRolloverTime
     *
     * @return integer 
     */
    public function getNoRolloverTime()
    {
        return $this->noRolloverTime;
    }

    /**
     * Set endRate
     *
     * @param string $endRate
     * @return BinaryOption
     */
    public function setEndRate($endRate)
    {
        $this->endRate = $endRate;

        return $this;
    }

    /**
     * Get endRate
     *
     * @return string 
     */
    public function getEndRate()
    {
        return $this->endRate;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return BinaryOption
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
     * Set endTradePrice
     *
     * @param string $endTradePrice
     * @return BinaryOption
     */
    public function setEndTradePrice($endTradePrice)
    {
        $this->endTradePrice = $endTradePrice;

        return $this;
    }

    /**
     * Get endTradePrice
     *
     * @return string 
     */
    public function getEndTradePrice()
    {
        return $this->endTradePrice;
    }

    /**
     * Set priceTick
     *
     * @param integer $priceTick
     * @return BinaryOption
     */
    public function setPriceTick($priceTick)
    {
        $this->priceTick = $priceTick;

        return $this;
    }

    /**
     * Get priceTick
     *
     * @return integer 
     */
    public function getPriceTick()
    {
        return $this->priceTick;
    }

    /**
     * Set color
     *
     * @param integer $color
     * @return BinaryOption
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return integer 
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set ruleId
     *
     * @param integer $ruleId
     * @return BinaryOption
     */
    public function setRuleId($ruleId)
    {
        $this->ruleId = $ruleId;

        return $this;
    }

    /**
     * Get ruleId
     *
     * @return integer 
     */
    public function getRuleId()
    {
        return $this->ruleId;
    }

    /**
     * Set callPositionsNum
     *
     * @param integer $callPositionsNum
     * @return BinaryOption
     */
    public function setCallPositionsNum($callPositionsNum)
    {
        $this->callPositionsNum = $callPositionsNum;

        return $this;
    }

    /**
     * Get callPositionsNum
     *
     * @return integer 
     */
    public function getCallPositionsNum()
    {
        return $this->callPositionsNum;
    }

    /**
     * Set putPositionsNum
     *
     * @param integer $putPositionsNum
     * @return BinaryOption
     */
    public function setPutPositionsNum($putPositionsNum)
    {
        $this->putPositionsNum = $putPositionsNum;

        return $this;
    }

    /**
     * Get putPositionsNum
     *
     * @return integer 
     */
    public function getPutPositionsNum()
    {
        return $this->putPositionsNum;
    }

    /**
     * Set callPositionsAmount
     *
     * @param integer $callPositionsAmount
     * @return BinaryOption
     */
    public function setCallPositionsAmount($callPositionsAmount)
    {
        $this->callPositionsAmount = $callPositionsAmount;

        return $this;
    }

    /**
     * Get callPositionsAmount
     *
     * @return integer 
     */
    public function getCallPositionsAmount()
    {
        return $this->callPositionsAmount;
    }

    /**
     * Set putPositionsAmount
     *
     * @param integer $putPositionsAmount
     * @return BinaryOption
     */
    public function setPutPositionsAmount($putPositionsAmount)
    {
        $this->putPositionsAmount = $putPositionsAmount;

        return $this;
    }

    /**
     * Get putPositionsAmount
     *
     * @return integer 
     */
    public function getPutPositionsAmount()
    {
        return $this->putPositionsAmount;
    }

    /**
     * Set suspended
     *
     * @param integer $suspended
     * @return BinaryOption
     */
    public function setSuspended($suspended)
    {
        $this->suspended = $suspended;

        return $this;
    }

    /**
     * Get suspended
     *
     * @return integer 
     */
    public function getSuspended()
    {
        return $this->suspended;
    }

    /**
     * Set pricePer
     *
     * @param string $pricePer
     * @return BinaryOption
     */
    public function setPricePer($pricePer)
    {
        $this->pricePer = $pricePer;

        return $this;
    }

    /**
     * Get pricePer
     *
     * @return string 
     */
    public function getPricePer()
    {
        return $this->pricePer;
    }

    /**
     * Set sixtySeconds
     *
     * @param integer $sixtySeconds
     * @return BinaryOption
     */
    public function setSixtySeconds($sixtySeconds)
    {
        $this->sixtySeconds = $sixtySeconds;

        return $this;
    }

    /**
     * Get sixtySeconds
     *
     * @return integer 
     */
    public function getSixtySeconds()
    {
        return $this->sixtySeconds;
    }

    /**
     * Set maxBuyOutTime
     *
     * @param integer $maxBuyOutTime
     * @return BinaryOption
     */
    public function setMaxBuyOutTime($maxBuyOutTime)
    {
        $this->maxBuyOutTime = $maxBuyOutTime;

        return $this;
    }

    /**
     * Get maxBuyOutTime
     *
     * @return integer 
     */
    public function getMaxBuyOutTime()
    {
        return $this->maxBuyOutTime;
    }

    /**
     * Set bmoSuspended
     *
     * @param integer $bmoSuspended
     * @return BinaryOption
     */
    public function setBmoSuspended($bmoSuspended)
    {
        $this->bmoSuspended = $bmoSuspended;

        return $this;
    }

    /**
     * Get bmoSuspended
     *
     * @return integer 
     */
    public function getBmoSuspended()
    {
        return $this->bmoSuspended;
    }

    /**
     * Set optionType
     *
     * @param integer $optionType
     * @return BinaryOption
     */
    public function setOptionType($optionType)
    {
        $this->optionType = $optionType;

        return $this;
    }

    /**
     * Get optionType
     *
     * @return integer 
     */
    public function getOptionType()
    {
        return $this->optionType;
    }

    /**
     * Set vIPGroup
     *
     * @param integer $vIPGroup
     * @return BinaryOption
     */
    public function setVIPGroup($vIPGroup)
    {
        $this->vIPGroup = $vIPGroup;

        return $this;
    }

    /**
     * Get vIPGroup
     *
     * @return integer 
     */
    public function getVIPGroup()
    {
        return $this->vIPGroup;
    }

    /**
     * Set isWeekendOption
     *
     * @param integer $isWeekendOption
     * @return BinaryOption
     */
    public function setIsWeekendOption($isWeekendOption)
    {
        $this->isWeekendOption = $isWeekendOption;

        return $this;
    }

    /**
     * Get isWeekendOption
     *
     * @return integer 
     */
    public function getIsWeekendOption()
    {
        return $this->isWeekendOption;
    }

    /**
     * Set goalRate
     *
     * @param string $goalRate
     * @return BinaryOption
     */
    public function setGoalRate($goalRate)
    {
        $this->goalRate = $goalRate;

        return $this;
    }

    /**
     * Get goalRate
     *
     * @return string 
     */
    public function getGoalRate()
    {
        return $this->goalRate;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return BinaryOption
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
