<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Country
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
     * @var string
     *
     * @ORM\Column(name="iso", type="string", length=2)
     */
    private $iso;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=80)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="iso3", type="string", length=3)
     */
    private $iso3;

    /**
     * @var string
     *
     * @ORM\Column(name="prefix", type="string", length=5)
     */
    private $prefix;

    /**
     * @var integer
     *
     * @ORM\Column(name="numcode", type="integer")
     */
    private $numcode;

    /**
     * @var integer
     *
     * @ORM\Column(name="block", type="smallint")
     */
    private $block;

    /**
     * @var integer
     *
     * @ORM\Column(name="allowRegistration", type="smallint")
     */
    private $allowRegistration;

    /**
     * @var integer
     *
     * @ORM\OneToMany(targetEntity="Getresponse360\ReplicatorBundle\Entity\Customer", mappedBy="user")
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
     * Set iso
     *
     * @param string $iso
     * @return Country
     */
    public function setIso($iso)
    {
        $this->iso = $iso;

        return $this;
    }

    /**
     * Get iso
     *
     * @return string 
     */
    public function getIso()
    {
        return $this->iso;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Country
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
     * Set iso3
     *
     * @param string $iso3
     * @return Country
     */
    public function setIso3($iso3)
    {
        $this->iso3 = $iso3;

        return $this;
    }

    /**
     * Get iso3
     *
     * @return string 
     */
    public function getIso3()
    {
        return $this->iso3;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     * @return Country
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string 
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set numcode
     *
     * @param integer $numcode
     * @return Country
     */
    public function setNumcode($numcode)
    {
        $this->numcode = $numcode;

        return $this;
    }

    /**
     * Get numcode
     *
     * @return integer 
     */
    public function getNumcode()
    {
        return $this->numcode;
    }

    /**
     * Set block
     *
     * @param integer $block
     * @return Country
     */
    public function setBlock($block)
    {
        $this->block = $block;

        return $this;
    }

    /**
     * Get block
     *
     * @return integer 
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * Set allowRegistration
     *
     * @param integer $allowRegistration
     * @return Country
     */
    public function setAllowRegistration($allowRegistration)
    {
        $this->allowRegistration = $allowRegistration;

        return $this;
    }

    /**
     * Get allowRegistration
     *
     * @return integer 
     */
    public function getAllowRegistration()
    {
        return $this->allowRegistration;
    }
}
