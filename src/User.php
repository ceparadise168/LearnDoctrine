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

// add metadata mappings for the User and Bug

/**
* @OneToMany(targetEntity="Bug", mappedBy="reporter")
* @var Bug[]
**/
protected $reportedBugs = null;

/**
* @OneToMany(targetEntity="Bug", mappedBy="engineer")
* @var Bug[]
**/
protected $assignedBugs = null;

// add metadata mappings for the User and Bug

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

  // [Bug] redeclare
  //  protected $reportedBugs;
  //  protected $assignedBugs;

    public function __construct()
    {
        $this->reportedBuds = new ArrayCollection();
        $this->assignedBugs = new ArrayCollection();
    }

    //change the code to ensure consistency of the bi-directional reference
    
    // [Bug] redeclare
   // protected $reportedBugs = null;
   // protected $assignedBugs = null;

    public function addReportedBug($bug)
    {
        $this->reportedBugs[] = $bug;
    }

    public function assignedToBug($bug)
    {
        $this->assignedBugs[] = $bug;
    }

}
