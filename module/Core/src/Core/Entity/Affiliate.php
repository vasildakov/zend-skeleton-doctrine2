<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Affiliate
 * 
 * @ORM\Entity
 * @ORM\Table(name="affiliate",indexes={@ORM\Index(name="fk_user_role_id", columns={"role_id"})})
 * @ORM\Entity(repositoryClass="Core\Repository\AffiliateRepository")
 */

class Affiliate extends User
{

    const STATUS_VALIDATED  = 1;
    const STATUS_PENDING    = 2;

    public $statusOptions = array(
                    self::STATUS_PENDING    => "Pending",
                    self::STATUS_VALIDATED  => "Validated"
                );


    /**
     * @var integer
     * 
     * @ORM\Id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255, nullable=true)
     */
    private $username;


    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;


    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;


    /**
     * @var string
     *
     * @ORM\Column(name="affiliate_field", type="string", length=255, nullable=true)
     */
    private $affiliate_field;



    public function __construct()
    {
        $this->created_at = new \DateTime(); 
        $this->status = 2; 
    }

    
    /**
     * @var \Core\Entity\Role
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Role")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role_id", referencedColumnName="id")
     * })
     */
    private $role;


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
     * Set firstName
     *
     * @param string $firstName
     * @return User
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
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
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
     * Get status name
     *
     * @return string 
     */
    public function getStatusName() 
    {
        return $this->statusOptions[$this->status];
    }


    /**
     * Set role
     *
     * @param \Core\Entity\Role $role
     * @return User
     */
    public function setRole(\Core\Entity\Role $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \Core\Entity\Role 
     */
    public function getRole()
    {
        return $this->role;
    }

    

    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     * @return User
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at->format('Y-m-d');
    }


    /**
     * Set affiliate_field
     *
     * @param string $affiliateField
     * @return Affiliate
     */
    public function setAffiliateField($affiliateField)
    {
        $this->affiliate_field = $affiliateField;

        return $this;
    }

    /**
     * Get affiliate_field
     *
     * @return string 
     */
    public function getAffiliateField()
    {
        return $this->affiliate_field;
    }
}
