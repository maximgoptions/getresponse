<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * assets
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class assets
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="options")
     * @ORM\JoinColumn(name="id", referencedColumnName="assetId")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=45)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="symbolLeverate", type="string", length=20)
     */
    private $symbolLeverate;

    /**
     * @var string
     *
     * @ORM\Column(name="rate", type="decimal")
     */
    private $rate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdated", type="datetime")
     */
    private $lastUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="tradePrice", type="decimal")
     */
    private $tradePrice;


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
     * Set name
     *
     * @param string $name
     * @return assets
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set symbolLeverate
     *
     * @param string $symbolLeverate
     * @return assets
     */
    public function setSymbolLeverate($symbolLeverate)
    {
        $this->symbolLeverate = $symbolLeverate;

        return $this;
    }

    /**
     * Get symbolLeverate
     *
     * @return string 
     */
    public function getSymbolLeverate()
    {
        return $this->symbolLeverate;
    }

    /**
     * Set rate
     *
     * @param string $rate
     * @return assets
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
     * Set lastUpdated
     *
     * @param \DateTime $lastUpdated
     * @return assets
     */
    public function setLastUpdated($lastUpdated)
    {
        $this->lastUpdated = $lastUpdated;

        return $this;
    }

    /**
     * Get lastUpdated
     *
     * @return \DateTime 
     */
    public function getLastUpdated()
    {
        return $this->lastUpdated;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return assets
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
     * Set tradePrice
     *
     * @param string $tradePrice
     * @return assets
     */
    public function setTradePrice($tradePrice)
    {
        $this->tradePrice = $tradePrice;

        return $this;
    }

    /**
     * Get tradePrice
     *
     * @return string 
     */
    public function getTradePrice()
    {
        return $this->tradePrice;
    }
}
