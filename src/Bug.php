<?php

// src/Bug.php

// extend the domain model to match the requirements:
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Entity(repositoryClass = "BugRepository") @Table(name = "bugs")
 */

class Bug
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int 
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $description;

    /**
     * @Column(type="datetime")
     * @var DataTime
     */
    protected $created;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $status;

    public function getId()
    {
        return $this->id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }

    public function getCreated()
    {
        return $this->created;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }

    //extend the domain model to match the requirements:

    protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

}
