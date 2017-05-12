<?php

// src/User.php
// extend the domain model to match the requirements:
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity @Table(name="users")
 */

class User
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    } 

    protected $reportedBugs;
    protected $assignedBugs;

    public function __construct()
    {
        $this->reportedBuds = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    protected $reportedBugs = null;
    protected $assignedBugs = null;

    public function addReportedBug($bug)
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug($bug)
    {
        $this->assignedBugs[] = $bug;
    }

}
