<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 * @ORM\Entity(repositoryClass="Core\Repository\CountryRepository") 
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
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
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     */
    private $name;


   /**
     * @var string
     *
     * @ORM\Column(name="alpha2", type="string", length=2, nullable=true)
     */
    private $alpha2;


   /**
     * @var string
     *
     * @ORM\Column(name="alpha3", type="string", length=3, nullable=true)
     */
    private $alpha3;


   /**
     * @var string
     *
     * @ORM\Column(name="country_code", type="string", length=3, nullable=true)
     */
    private $country_code;    


   /**
     * @var string
     *
     * @ORM\Column(name="iso_3166_2", type="string", length=13, nullable=true)
     */
    private $iso_3166_2;  


   /**
     * @var string
     *
     * @ORM\Column(name="region_code", type="string", length=3, nullable=true)
     */
    private $region_code;  

   /**
     * @var string
     *
     * @ORM\Column(name="sub_region_code", type="string", length=3, nullable=true)
     */
    private $sub_region_code;  


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="smallint", nullable=true)
     */
    private $status;



    public function __construct() 
    {
        $this->created = new \DateTime(); 
    }

    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }


    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }


    /**
     * Convert the object to an array.
     *
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
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
     * Set alpha2
     *
     * @param string $alpha2
     * @return Country
     */
    public function setAlpha2($alpha2) 
    {
        $this->alpha2 = $alpha2;
        return $this;
    }


    public function getAlpha2() 
    {
        return $this->alpha2;
    }


    /**
     * Set alpha3
     *
     * @param string $alpha3
     * @return Country
     */
    public function setAlpha3($alpha3) 
    {
        $this->alpha3 = $alpha3;
        return $this;
    }


    public function getAlpha3() 
    {
        return $this->alpha3;
    }


    /**
     * Set country_code
     *
     * @param string $countryCode
     * @return Country
     */
    public function setCountryCode($countryCode)
    {
        $this->country_code = $countryCode;

        return $this;
    }


    /**
     * Get country_code
     *
     * @return string 
     */
    public function getCountryCode()
    {
        return $this->country_code;
    }


    /**
     * Set iso_3166_2
     *
     * @param string $iso31662
     * @return Country
     */
    public function setIso31662($iso31662)
    {
        $this->iso_3166_2 = $iso31662;

        return $this;
    }


    /**
     * Get iso_3166_2
     *
     * @return string 
     */
    public function getIso31662()
    {
        return $this->iso_3166_2;
    }


    /**
     * Set region_code
     *
     * @param string $regionCode
     * @return Country
     */
    public function setRegionCode($regionCode)
    {
        $this->region_code = $regionCode;

        return $this;
    }


    /**
     * Get region_code
     *
     * @return string 
     */
    public function getRegionCode()
    {
        return $this->region_code;
    }


    /**
     * Set sub_region_code
     *
     * @param string $subRegionCode
     * @return Country
     */
    public function setSubRegionCode($subRegionCode)
    {
        $this->sub_region_code = $subRegionCode;

        return $this;
    }


    /**
     * Get sub_region_code
     *
     * @return string 
     */
    public function getSubRegionCode()
    {
        return $this->sub_region_code;
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
     * Set created
     *
     * @param \DateTime $created
     * @return Country
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
}
