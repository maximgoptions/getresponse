<?php

namespace Goptions\SilverpopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Import
 *
 * @ORM\Table(name="imports")
 * @ORM\Entity
 */
class Import
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
     * @ORM\Column(name="type", type="string", length=20)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="endIdImported", type="integer", nullable=true)
     */
    private $endIdImported;

    /**
     * @var integer
     *
     * @ORM\Column(name="startIdImported", type="integer", nullable=true)
     */
    private $startIdImported;

    /**
     * @var integer
     *
     * @ORM\Column(name="listId", type="integer", nullable=true)
     */
    private $listId;

    /**
     * @var integer
     *
     * @ORM\Column(name="excutionDuration", type="integer", nullable=true)
     */
    private $excutionDuration;

    /**
     * @var integer
     *
     * @ORM\Column(name="resultsPerPage", type="integer", nullable=true)
     */
    private $resultsPerPage;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20, nullable=true)
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timeImported", type="datetime")
     */
    private $timeImported;


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
     * Set type
     *
     * @param string $type
     * @return Import
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set startIdImported
     *
     * @param integer $startIdImported
     * @return Import
     */
    public function setStartIdImported($startIdImported)
    {
        $this->startIdImported = $startIdImported;

        return $this;
    }

    /**
     * Get startIdImported
     *
     * @return integer 
     */
    public function getStartIdImported()
    {
        return $this->startIdImported;
    }

    /**
     * Set endIdImported
     *
     * @param integer $endIdImported
     * @return Import
     */
    public function setEndIdImported($endIdImported)
    {
        $this->endIdImported = $endIdImported;

        return $this;
    }

    /**
     * Get endIdImported
     *
     * @return integer 
     */
    public function getEndIdImported()
    {
        return $this->endIdImported;
    }

    /**
     * Set listId
     *
     * @param integer $listId
     * @return Import
     */
    public function setListId($listId)
    {
        $this->listId = $listId;

        return $this;
    }

    /**
     * Get listId
     *
     * @return integer 
     */
    public function getListId()
    {
        return $this->listId;
    }

    /**
     * Set excutionDuration
     *
     * @param integer $excutionDuration
     * @return Import
     */
    public function setExcutionDuration($excutionDuration)
    {
        $this->excutionDuration = $excutionDuration;

        return $this;
    }

    /**
     * Get excutionDuration
     *
     * @return integer 
     */
    public function getExcutionDuration()
    {
        return $this->excutionDuration;
    }
    /**
     * Set resultsPerPage
     *
     * @param integer $resultsPerPage
     * @return Import
     */
    public function setResultsPerPage($resultsPerPage)
    {
        $this->resultsPerPage = $resultsPerPage;

        return $this;
    }

    /**
     * Get resultsPerPage
     *
     * @return integer 
     */
    public function getResultsPerPage()
    {
        return $this->resultsPerPage;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Import
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set timeImported
     *
     * @param \DateTime $timeImported
     * @return Import
     */
    public function setTimeImported($timeImported)
    {
        $this->timeImported = $timeImported;

        return $this;
    }

    /**
     * Get timeImported
     *
     * @return \DateTime 
     */
    public function getTimeImported()
    {
        return $this->timeImported;
    }

}
