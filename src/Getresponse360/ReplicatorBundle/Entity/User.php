<?php

namespace Getresponse360\ReplicatorBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User
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
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=25)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=25)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=25)
     */
    private $city;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="smallint")
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(name="zip", type="integer")
     */
    private $zip;

    /**
     * @var string
     *
     * @ORM\Column(name="streetName", type="string", length=25)
     */
    private $streetName;

    /**
     * @var integer
     *
     * @ORM\Column(name="streetNum", type="integer")
     */
    private $streetNum;

    /**
     * @var integer
     *
     * @ORM\Column(name="aptNum", type="integer")
     */
    private $aptNum;

    /**
     * @var string
     *
     * @ORM\Column(name="primaryPhone", type="string", length=25)
     */
    private $primaryPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="secondaryPhone", type="string", length=25)
     */
    private $secondaryPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="cellphone", type="string", length=30)
     */
    private $cellphone;

    /**
     * @var integer
     *
     * @ORM\Column(name="extension", type="smallint")
     */
    private $extension;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=25)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var integer
     *
     * @ORM\Column(name="department", type="integer")
     */
    private $department;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var float
     *
     * @ORM\Column(name="commision", type="float")
     */
    private $commision;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateJoined", type="datetime")
     */
    private $dateJoined;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePassword", type="datetime")
     */
    private $datePassword;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastLogin", type="datetime")
     */
    private $lastLogin;

    /**
     * @var string
     *
     * @ORM\Column(name="lastPassword", type="string", length=255)
     */
    private $lastPassword;

    /**
     * @var integer
     *
     * @ORM\Column(name="userGroup", type="smallint")
     */
    private $userGroup;

    /**
     * @var string
     *
     * @ORM\Column(name="userSelectedLang", type="string", length=5)
     */
    private $userSelectedLang;

    /**
     * @var integer
     *
     * @ORM\Column(name="regulationCompliance", type="smallint")
     */
    private $regulationCompliance;

    /**
     * @var integer
     *
     * @ORM\Column(name="isActive", type="integer")
     */
    private $isActive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="failLoginDate", type="datetime")
     */
    private $failLoginDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastUpdateDate", type="datetime")
     */
    private $lastUpdateDate;

    /**
     * @var string
     *
     * @ORM\Column(name="signature", type="string", length=500)
     */
    private $signature;

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
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set firstName
     *
     * @param string $firstName
     * @return User
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
     * @return User
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
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set country
     *
     * @param integer $country
     * @return User
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
     * Set zip
     *
     * @param integer $zip
     * @return User
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return integer 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set streetName
     *
     * @param string $streetName
     * @return User
     */
    public function setStreetName($streetName)
    {
        $this->streetName = $streetName;

        return $this;
    }

    /**
     * Get streetName
     *
     * @return string 
     */
    public function getStreetName()
    {
        return $this->streetName;
    }

    /**
     * Set streetNum
     *
     * @param integer $streetNum
     * @return User
     */
    public function setStreetNum($streetNum)
    {
        $this->streetNum = $streetNum;

        return $this;
    }

    /**
     * Get streetNum
     *
     * @return integer 
     */
    public function getStreetNum()
    {
        return $this->streetNum;
    }

    /**
     * Set aptNum
     *
     * @param integer $aptNum
     * @return User
     */
    public function setAptNum($aptNum)
    {
        $this->aptNum = $aptNum;

        return $this;
    }

    /**
     * Get aptNum
     *
     * @return integer 
     */
    public function getAptNum()
    {
        return $this->aptNum;
    }

    /**
     * Set primaryPhone
     *
     * @param string $primaryPhone
     * @return User
     */
    public function setPrimaryPhone($primaryPhone)
    {
        $this->primaryPhone = $primaryPhone;

        return $this;
    }

    /**
     * Get primaryPhone
     *
     * @return string 
     */
    public function getPrimaryPhone()
    {
        return $this->primaryPhone;
    }

    /**
     * Set secondaryPhone
     *
     * @param string $secondaryPhone
     * @return User
     */
    public function setSecondaryPhone($secondaryPhone)
    {
        $this->secondaryPhone = $secondaryPhone;

        return $this;
    }

    /**
     * Get secondaryPhone
     *
     * @return string 
     */
    public function getSecondaryPhone()
    {
        return $this->secondaryPhone;
    }

    /**
     * Set cellphone
     *
     * @param string $cellphone
     * @return User
     */
    public function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;

        return $this;
    }

    /**
     * Get cellphone
     *
     * @return string 
     */
    public function getCellphone()
    {
        return $this->cellphone;
    }

    /**
     * Set extension
     *
     * @param integer $extension
     * @return User
     */
    public function setExtension($extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return integer 
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set department
     *
     * @param integer $department
     * @return User
     */
    public function setDepartment($department)
    {
        $this->department = $department;

        return $this;
    }

    /**
     * Get department
     *
     * @return integer 
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return User
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
     * Set commision
     *
     * @param float $commision
     * @return User
     */
    public function setCommision($commision)
    {
        $this->commision = $commision;

        return $this;
    }

    /**
     * Get commision
     *
     * @return float 
     */
    public function getCommision()
    {
        return $this->commision;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return User
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
     * Set dateJoined
     *
     * @param \DateTime $dateJoined
     * @return User
     */
    public function setDateJoined($dateJoined)
    {
        $this->dateJoined = $dateJoined;

        return $this;
    }

    /**
     * Get dateJoined
     *
     * @return \DateTime 
     */
    public function getDateJoined()
    {
        return $this->dateJoined;
    }

    /**
     * Set datePassword
     *
     * @param \DateTime $datePassword
     * @return User
     */
    public function setDatePassword($datePassword)
    {
        $this->datePassword = $datePassword;

        return $this;
    }

    /**
     * Get datePassword
     *
     * @return \DateTime 
     */
    public function getDatePassword()
    {
        return $this->datePassword;
    }

    /**
     * Set lastLogin
     *
     * @param \DateTime $lastLogin
     * @return User
     */
    public function setLastLogin($lastLogin)
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    /**
     * Get lastLogin
     *
     * @return \DateTime 
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }

    /**
     * Set lastPassword
     *
     * @param string $lastPassword
     * @return User
     */
    public function setLastPassword($lastPassword)
    {
        $this->lastPassword = $lastPassword;

        return $this;
    }

    /**
     * Get lastPassword
     *
     * @return string 
     */
    public function getLastPassword()
    {
        return $this->lastPassword;
    }

    /**
     * Set userGroup
     *
     * @param integer $userGroup
     * @return User
     */
    public function setUserGroup($userGroup)
    {
        $this->userGroup = $userGroup;

        return $this;
    }

    /**
     * Get userGroup
     *
     * @return integer 
     */
    public function getUserGroup()
    {
        return $this->userGroup;
    }

    /**
     * Set userSelectedLang
     *
     * @param string $userSelectedLang
     * @return User
     */
    public function setUserSelectedLang($userSelectedLang)
    {
        $this->userSelectedLang = $userSelectedLang;

        return $this;
    }

    /**
     * Get userSelectedLang
     *
     * @return string 
     */
    public function getUserSelectedLang()
    {
        return $this->userSelectedLang;
    }

    /**
     * Set regulationCompliance
     *
     * @param integer $regulationCompliance
     * @return User
     */
    public function setRegulationCompliance($regulationCompliance)
    {
        $this->regulationCompliance = $regulationCompliance;

        return $this;
    }

    /**
     * Get regulationCompliance
     *
     * @return integer 
     */
    public function getRegulationCompliance()
    {
        return $this->regulationCompliance;
    }

    /**
     * Set isActive
     *
     * @param integer $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return integer 
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Set failLoginDate
     *
     * @param \DateTime $failLoginDate
     * @return User
     */
    public function setFailLoginDate($failLoginDate)
    {
        $this->failLoginDate = $failLoginDate;

        return $this;
    }

    /**
     * Get failLoginDate
     *
     * @return \DateTime 
     */
    public function getFailLoginDate()
    {
        return $this->failLoginDate;
    }

    /**
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     * @return User
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
     * Set signature
     *
     * @param string $signature
     * @return User
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string 
     */
    public function getSignature()
    {
        return $this->signature;
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
