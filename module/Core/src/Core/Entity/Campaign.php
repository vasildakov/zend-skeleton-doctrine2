<?php

namespace Core\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface; 

/**
 * Campaign
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity(repositoryClass="Core\Repository\CampaignRepository") 
 * @ORM\Table(name="campaign")
 */
class Campaign implements InputFilterAwareInterface
{

    protected $inputFilter;

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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;


    /**
     * @var \Core\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     * })
     */
    private $created_by;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */
    private $created_at;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="started_at", type="datetime", nullable=true)
     */
    private $started_at;    


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="ended_at", type="datetime", nullable=true)
     */
    private $ended_at;


    /**
     * @var \Core\Entity\Operator
     *
     * @ORM\ManyToOne(targetEntity="Core\Entity\Operator")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="operator_id", referencedColumnName="id")
     * })
     */
    private $operator;


    /**
     * @var \Core\Entity\Language
     *
     * @ORM\ManyToMany(targetEntity="Core\Entity\Language")
     * @ORM\JoinTable(name="campaign_language", 
     *      joinColumns={@ORM\JoinColumn(name="campaign_id", referencedColumnName="id")
     * })
     */
    private $languages;


    public function __construct() 
    {
        $this->languages = new ArrayCollection();

        $this->created_at = new \DateTime(); 
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
     * Populate from an array.
     *
     * @param array $data
     */
    public function populate($data = array())
    {
        $this->id           = (isset($data['id']))          ? $data['id']           : null;
        $this->name         = (isset($data['name']))        ? $data['name']         : null;
        $this->started_at   = (isset($data['started_at']))  ? $data['started_at']   : null;
        $this->ended_at     = (isset($data['ended_at']))    ? $data['ended_at']     : null;
        // $this->operator     = (isset($data['operator']))    ? $data['operator']     : null;
        
    }


    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }


    public function getInputFilter() 
    {
        if (!$this->inputFilter) {

            $inputFilter = new InputFilter();

            $factory = new InputFactory();

            
            $inputFilter->add($factory->createInput(array(
                'name' => 'id',
                'required' => false,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'name',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name' => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min' => 6,
                            'max' => 100,
                        ),
                    ),
                ),
            )));



            // @TODO: Add input filters for the other field


            $this->inputFilter = $inputFilter;  
        }

        return $this->inputFilter;
    }


    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        // http://docs.doctrine-project.org/en/2.0.x/reference/events.html
        $this->comment = 'changed from prePersist callback!';
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
     * @return Campaign
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }


    public function getName()
    {
        return $this->name;
    }



    /**
     * Set created_at
     *
     * @param \DateTime $created_at
     * @return Campaign
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
        // return $this->created_at;
        return $this->created_at->format('Y-m-d');
    }


    /**
     * Set started_at
     *
     * @param \DateTime $started_at
     * @return Campaign
     */
    public function setStartedAt($started_at)
    {
        $this->started_at = $started_at;

        return $this;
    }


    /**
     * Get started_at
     *
     * @return \DateTime 
     */
    public function getStartedAt()
    {
        return $this->started_at;
        // return $this->started_at->format('Y-m-d');
    }


    /**
     * Set ended_at
     *
     * @param \DateTime $ended_at
     * @return Campaign
     */
    public function setEndedAt($ended_at)
    {
        $this->ended_at = $ended_at;

        return $this;
    }


    /**
     * Get started_at
     *
     * @return \DateTime 
     */
    public function getEndedAt()
    {
        return $this->ended_at->format('Y-m-d');
        // return $this->ended_at;
    }


    /**
     * Set user
     *
     * @param \Core\Entity\User $user
     * @return Campaign
     */
    public function setCreatedBy(\Core\Entity\User $user = null)
    {
        $this->created_by = $user;
        
        return $this;
    }


    /**
     * Get user
     *
     * @return \Core\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set operator
     *
     * @param \Core\Entity\Operator $operator
     * @return Campaign
     */
    public function setOperator(\Core\Entity\Operator $operator = null)
    {
        $this->operator = $operator;
        
        return $this;
    }


    /**
     * Get operator
     *
     * @return \Core\Entity\Operator 
     */
    public function getOperator()
    {
        return $this->operator;
    }


    /**
     * Returns true if the ending date is empty or higher than today
     * @return boolean 
     */
    public function isActive() 
    {
        $ended = $this->started_at;
        $today = new \DateTime();

        return ( empty($ended) or $ended->format("Y-m-d") > $today->format("Y-m-d") ) ? true : false;
    }


    /**
     * Returns true if the campaign has at least one language
     * @return boolean 
     */
    public function hasLanguages() 
    {
        return !$this->languages->isEmpty();
    }


    /**
     * Returns true if the campaign has a specific language
     * @param \Core\Entity\Language $language
     * @return boolean 
     */
    public function hasLanguage(\Core\Entity\Language $language) 
    {
        foreach($this->languages as $entity) {
            if ($entity == $language) {
                return true;
            }
        }
        return false;
    }


    /**
     * Returns campaign languages
     * @return \Doctrine\Common\Collections\ArrayCollection
     */
    public function getLanguages() 
    {
        return $this->languages;
    }



    /**
     * @param \Core\Entity\Language $language
     */
    public function addLanguage(\Core\Entity\Language $language) 
    {
        $this->languages[] = $language;
    }



    /**
     * Set description
     *
     * @param string $description
     * @return Campaign
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Campaign
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Remove languages
     *
     * @param \Core\Entity\Language $languages
     */
    public function removeLanguage(\Core\Entity\Language $languages)
    {
        $this->languages->removeElement($languages);
    }
}
