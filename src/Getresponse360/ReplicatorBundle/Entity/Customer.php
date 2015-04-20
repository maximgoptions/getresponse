<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Customer
 *
 * @ORM\Table(name="customers")
 * @ORM\Entity
 */
class Customer
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
     * @ORM\Column(name="FirstName", type="string", length=45)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="LastName", type="string", length=45)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Phone", type="string", length=20)
     */
    private $phone;

    /**
     * @var integer
     *
     * @ORM\Column(name="Country", type="smallint")
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="siteLanguage", type="string", length=3)
     */
    private $siteLanguage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="regTime", type="datetime")
     */
    private $regTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastTimeActive", type="datetime")
     */
    private $lastTimeActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastLoginDate", type="datetime")
     */
    private $lastLoginDate;

    /**
     * @var float
     *
     * @ORM\Column(name="lastAccountBalance", type="float")
     */
    private $lastAccountBalance;

    /**
     * @var integer
     *
     * @ORM\Column(name="accountType", type="integer")
     */
    private $accountType;

    /**
     * @var integer
     *
     * @ORM\Column(name="currency", type="integer")
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="leadConversionSource", type="string", length=10)
     */
    private $leadConversionSource;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="firstDepositDate", type="datetime")
     */
    private $firstDepositDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="saleStatus", type="integer")
     */
    private $saleStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="leadStatus", type="integer")
     */
    private $leadStatus;

    /**
     * @var integer
     *
     * @ORM\Column(name="tradingEmails", type="smallint")
     */
    private $tradingEmails;

    /**
     * @var integer
     *
     * @ORM\Column(name="promotionalEmails", type="smallint")
     */
    private $promotionalEmails;

    /**
     * @var integer
     *
     * @ORM\Column(name="isDemo", type="smallint")
     */
    private $isDemo;

    /**
     * @var integer
     *
     * @ORM\Column(name="employeeInChargeId", type="integer")
     */
    private $employeeInChargeId;

    /**
     * @var integer
     *
     * @ORM\Column(name="isSuspended", type="smallint")
     */
    private $isSuspended;

    /**
     * @var boolean
     *
     * @ORM\OneToMany(targetEntity="Getresponse360\ReplicatorBundle\Entity\CustomerDeposit", mappedBy="customer")
     */
    private $deposits;

    /**
     * @var boolean
     *
     * @ORM\OneToMany(targetEntity="Getresponse360\ReplicatorBundle\Entity\Withdrawal", mappedBy="customer")
     */
    private $withdrawal;

    /**
     * @var boolean
     *
     * @ORM\OneToMany(targetEntity="Getresponse360\ReplicatorBundle\Entity\Positions", mappedBy="customer")
     */
    private $positions;

    /**
     * @var boolean
     *
     * @ORM\ManyToOne(targetEntity="Getresponse360\ReplicatorBundle\Entity\User", inversedBy="customer")
     * @ORM\JoinColumn(name="employeeinchargeid", referencedColumnName="id")
     */
    private $user;

    /**
     * @var boolean
     *
     * @ORM\ManyToOne(targetEntity="Getresponse360\ReplicatorBundle\Entity\Country", inversedBy="customer")
     * @ORM\JoinColumn(name="country", referencedColumnName="id")
     */
    private $mycountry;

    /**
     * @var boolean
     *
     * @ORM\ManyToOne(targetEntity="Getresponse360\ReplicatorBundle\Entity\CustomerBalance", inversedBy="customer")
     * @ORM\JoinColumn(name="id", referencedColumnName="customerId")
     */
    private $customerbalance;


    /**
     * Add deposits
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\CustomerDeposit $deposits
     * @return Customer
     */
    public function addDeposit(\Getresponse360\ReplicatorBundle\Entity\CustomerDeposit $deposits)
    {
        $this->deposits[] = $deposits;

        return $this;
    }

    /**
     * Remove deposits
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\CustomerDeposit $deposits
     */
    public function removeDeposit(\Getresponse360\ReplicatorBundle\Entity\CustomerDeposit $deposits)
    {
        $this->deposits->removeElement($deposits);
    }

    /**
     * Get deposits
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDeposits()
    {
        return $this->deposits;
    }


    /**
     * Add withdrawal
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Withdrawal $withdrawal
     * @return Customer
     */
    public function addWithdrawal(\Getresponse360\ReplicatorBundle\Entity\Withdrawal $withdrawal)
    {
        $this->withdrawal[] = $withdrawal;

        return $this;
    }

    /**
     * Remove withdrawal
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\Withdrawal $withdrawal
     */
    public function removeWithdrawal(\Getresponse360\ReplicatorBundle\Entity\Withdrawal $withdrawal)
    {
        $this->withdrawal->removeElement($withdrawal);
    }

    /**
     * Get withdrawal
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getWithdrawal()
    {
        return $this->withdrawal;
    }


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
     * Set user
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\User $user
     * @return Customer
     */
    public function setUser(\Getresponse360\ReplicatorBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Getresponse360\ReplicatorBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set customerbalance
     *
     * @param \Getresponse360\ReplicatorBundle\Entity\CustomerBalance $customerbalance
     * @return Customer
     */
    public function setcustomerbalance(\Getresponse360\ReplicatorBundle\Entity\CustomerBalance $customerbalance = null)
    {
        $this->customerbalance = $customerbalance;

        return $this;
    }

    /**
     * Get customerbalance
     *
     * @return \Getresponse360\ReplicatorBundle\Entity\CustomerBalance 
     */
    public function getcustomerbalance()
    {
        return $this->customerbalance;
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
     * Set firstName
     *
     * @param string $firstName
     * @return Post
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Post
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Post
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Post
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set country
     *
     * @param integer $country
     * @return Post
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return integer 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set siteLanguage
     *
     * @param string $siteLanguage
     * @return Post
     */
    public function setSiteLanguage($siteLanguage)
    {
        $this->siteLanguage = $siteLanguage;

        return $this;
    }

    /**
     * Get siteLanguage
     *
     * @return string 
     */
    public function getSiteLanguage()
    {
        return $this->siteLanguage;
    }

    /**
     * Set regTime
     *
     * @param \DateTime $regTime
     * @return Post
     */
    public function setRegTime($regTime)
    {
        $this->regTime = $regTime;

        return $this;
    }

    /**
     * Get regTime
     *
     * @return \DateTime 
     */
    public function getRegTime()
    {
        return $this->regTime;
    }

    /**
     * Set lastTimeActive
     *
     * @param \DateTime $lastTimeActive
     * @return Post
     */
    public function setLastTimeActive($lastTimeActive)
    {
        $this->lastTimeActive = $lastTimeActive;

        return $this;
    }

    /**
     * Get lastTimeActive
     *
     * @return \DateTime 
     */
    public function getLastTimeActive()
    {
        return $this->lastTimeActive;
    }

    /**
     * Set lastLoginDate
     *
     * @param \DateTime $lastLoginDate
     * @return Post
     */
    public function setLastLoginDate($lastLoginDate)
    {
        $this->lastLoginDate = $lastLoginDate;

        return $this;
    }

    /**
     * Get lastLoginDate
     *
     * @return \DateTime 
     */
    public function getLastLoginDate()
    {
        return $this->lastLoginDate;
    }

    /**
     * Set lastAccountBalance
     *
     * @param float $lastAccountBalance
     * @return Post
     */
    public function setLastAccountBalance($lastAccountBalance)
    {
        $this->lastAccountBalance = $lastAccountBalance;

        return $this;
    }

    /**
     * Get lastAccountBalance
     *
     * @return float 
     */
    public function getLastAccountBalance()
    {
        return $this->lastAccountBalance;
    }

    /**
     * Set accountType
     *
     * @param integer $accountType
     * @return Post
     */
    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;

        return $this;
    }

    /**
     * Get accountType
     *
     * @return integer 
     */
    public function getAccountType()
    {
        return $this->accountType;
    }

    /**
     * Set currency
     *
     * @param integer $currency
     * @return Post
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
     * Set leadConversionSource
     *
     * @param string $leadConversionSource
     * @return Post
     */
    public function setLeadConversionSource($leadConversionSource)
    {
        $this->leadConversionSource = $leadConversionSource;

        return $this;
    }

    /**
     * Get leadConversionSource
     *
     * @return string 
     */
    public function getLeadConversionSource()
    {
        return $this->leadConversionSource;
    }

    /**
     * Set firstDepositDate
     *
     * @param \DateTime $firstDepositDate
     * @return Post
     */
    public function setFirstDepositDate($firstDepositDate)
    {
        $this->firstDepositDate = $firstDepositDate;

        return $this;
    }

    /**
     * Get firstDepositDate
     *
     * @return \DateTime 
     */
    public function getFirstDepositDate()
    {
        return $this->firstDepositDate;
    }

    /**
     * Set saleStatus
     *
     * @param integer $saleStatus
     * @return Post
     */
    public function setSaleStatus($saleStatus)
    {
        $this->saleStatus = $saleStatus;

        return $this;
    }

    /**
     * Get saleStatus
     *
     * @return integer 
     */
    public function getSaleStatus()
    {
        return $this->saleStatus;
    }

    /**
     * Set leadStatus
     *
     * @param integer $leadStatus
     * @return Post
     */
    public function setLeadStatus($leadStatus)
    {
        $this->leadStatus = $leadStatus;

        return $this;
    }

    /**
     * Get leadStatus
     *
     * @return integer 
     */
    public function getLeadStatus()
    {
        return $this->leadStatus;
    }

    /**
     * Set tradingEmails
     *
     * @param integer $tradingEmails
     * @return Post
     */
    public function setTradingEmails($tradingEmails)
    {
        $this->tradingEmails = $tradingEmails;

        return $this;
    }

    /**
     * Get tradingEmails
     *
     * @return integer 
     */
    public function getTradingEmails()
    {
        return $this->tradingEmails;
    }

    /**
     * Set promotionalEmails
     *
     * @param integer $promotionalEmails
     * @return Post
     */
    public function setPromotionalEmails($promotionalEmails)
    {
        $this->promotionalEmails = $promotionalEmails;

        return $this;
    }

    /**
     * Get promotionalEmails
     *
     * @return integer 
     */
    public function getPromotionalEmails()
    {
        return $this->promotionalEmails;
    }

    /**
     * Set isDemo
     *
     * @param integer $isDemo
     * @return Post
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
     * Set employeeInChargeId
     *
     * @param integer $employeeInChargeId
     * @return Post
     */
    public function setEmployeeInChargeId($employeeInChargeId)
    {
        $this->employeeInChargeId = $employeeInChargeId;

        return $this;
    }

    /**
     * Get employeeInChargeId
     *
     * @return integer 
     */
    public function getEmployeeInChargeId()
    {
        return $this->employeeInChargeId;
    }

    /**
     * Set isSuspended
     *
     * @param integer $isSuspended
     * @return Post
     */
    public function setIsSuspended($isSuspended)
    {
        $this->isSuspended = $isSuspended;

        return $this;
    }

    /**
     * Get isSuspended
     *
     * @return integer 
     */
    public function getIsSuspended()
    {
        return $this->isSuspended;
    }
}
