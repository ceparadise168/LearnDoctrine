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

    // add metadata mappings for the Bug

    /**
     * @ManyToOne(targetEntity="User", inversedBy="assignedBugs")
     **/
    protected $engineer;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="reportedBugs")
     **/
    protected $reporter;

    /**
     * @ManyToMany(targetEntity="Product")
     **/
    protected $products;

    // add metadata mappings for the Bug


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

   //[Bug] redeclare
   //  protected $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }


    // hange the code to ensure consistency of the bi-directional reference:
  
    // [Bug] redeclare
    // protected $engineer;
    //protected $reporter;

    public function setEngineer($engineer)
    {
        $engineer->assignedToBug($this);
        $this->engineer = $engineer;
    }

    public function setReporter($reporter)
    {
        $reporter->addReportedBug($this);
        $this->reporter = $reporter;
    }

    public function getEngineer()
    {
        return $this->engineer;
    }

    public function getReporter()
    {
        return $this->reporter;
    }

    // Bugs reference Products by an uni-directional ManyToMany relation in the database that points from Bugs to Products.

    // [Bug] redeclare
    //protected $products = null;

    public function assignToProduct($product)
    {
        $this->products[] = $product;
    }

    public function getProducts()
    {
        return $this->products;
    }
}
