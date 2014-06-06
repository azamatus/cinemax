<?php

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cinemax\CinemaxBundle\Entity\Discs
 *
 * @ORM\Table(name="discs")
 * @ORM\Entity(repositoryClass="Cinemax\CinemaxBundle\Entity\DiscsRepository")
 */
class Discs
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var boolean $active
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_of_films", type="integer", nullable=true)
     */
    private $quantityFilms;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_of_series", type="integer", nullable=true)
     */
    private $quantitySeries;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantity_of_clips", type="integer", nullable=true)
     */
    private $quantityClips;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * @var \Gallery
     *
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Gallery" )
     * @ORM\JoinColumns({
     * @ORM\JoinColumn(name="poster_id", referencedColumnName="id")
     * })
     */
    private $poster;

    /**
     * @var \Countries
     *
     * @ORM\ManyToOne(targetEntity="Countries")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     * })
     */
    private $country;

    /**
     * @var \Janrs
     *
     * @ORM\ManyToOne(targetEntity="Janrs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="janr_id", referencedColumnName="id")
     * })
     */
    private $janr;

    /**
     * @var \Formats
     *
     * @ORM\ManyToOne(targetEntity="Formats")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="format_id", referencedColumnName="id")
     * })
     */
    private $format;

    /**
     * @var \Producers
     *
     * @ORM\ManyToOne(targetEntity="Producers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="producer_id", referencedColumnName="id")
     * })
     */
    private $producer;

    /**
     * @var \Translations
     *
     * @ORM\ManyToOne(targetEntity="Translations")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="translation_id", referencedColumnName="id")
     * })
     */
    private $translation;

    /**
     * @var \Types
     *
     * @ORM\ManyToOne(targetEntity="Types")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_id", referencedColumnName="id")
     * })
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="price", type="integer", nullable=true)
     */
    private $price;

//    /**
//     * @var \Prices
//     *
//     * @ORM\ManyToOne(targetEntity="Prices")
//     * @ORM\JoinColumns({
//     *   @ORM\JoinColumn(name="price", referencedColumnName="id")
//     * })
//     */
//    private $price;

    /**
     * @var DiscInfo
     *
     * @ORM\OneToMany(targetEntity="Cinemax\CinemaxBundle\Entity\DiscInfo", mappedBy="disc")
     */
    private $details;


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
     * @return Discs
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
     * Set description
     *
     * @param string $description
     * @return Discs
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
     * Set active
     * @param boolean $active
     * @return Discs
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean
     */
    public function getActive()
    {
        return $this -> active;
    }
    /**
     * Set quantityFilms
     *
     * @param integer $quantityFilms
     * @return Discs
     */
    public function setQuantityFilms($quantityFilms)
    {
        $this->quantityFilms = $quantityFilms;
    
        return $this;
    }

    /**
     * Get quantityFilms
     *
     * @return integer 
     */
    public function getQuantityFilms()
    {
        return $this->quantityFilms;
    }

    /**
     * Set price
     *
     * @param integer $price
     * @return Discs
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set quantitySeries
     *
     * @param integer $quantitySeries
     * @return Discs
     */
    public function setQuantitySeries($quantitySeries)
    {
        $this->quantitySeries = $quantitySeries;

        return $this;
    }

    /**
     * Get quantitySeries
     *
     * @return integer
     */
    public function getQuantitySeries()
    {
        return $this->quantitySeries;
    }
    /**
     * Set quantityClips
     *
     * @param integer $quantityClips
     * @return Discs
     */
    public function setQuantityClips($quantityClips)
    {
        $this->quantityClips = $quantityClips;

        return $this;
    }

    /**
     * Get quantityClips
     *
     * @return integer
     */
    public function getQuantityClips()
    {
        return $this->quantityClips;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Discs
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Set poster
     *
     * @param \Application\Sonata\MediaBundle\Entity\Gallery $poster
     * @return Discs
     */
    public function setPoster(\Application\Sonata\MediaBundle\Entity\Gallery $poster = null)
    {
        $this->poster = $poster;
    
        return $this;
    }

    /**
     * Get poster
     *
     * @return \Application\Sonata\MediaBundle\Entity\Gallery
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Set country
     *
     * @param \Cinemax\CinemaxBundle\Entity\Countries $country
     * @return Discs
     */
    public function setCountry(\Cinemax\CinemaxBundle\Entity\Countries $country = null)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return \Cinemax\CinemaxBundle\Entity\Countries 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set janr
     *
     * @param \Cinemax\CinemaxBundle\Entity\Janrs $janr
     * @return Discs
     */
    public function setJanr(\Cinemax\CinemaxBundle\Entity\Janrs $janr = null)
    {
        $this->janr = $janr;
    
        return $this;
    }

    /**
     * Get janr
     *
     * @return \Cinemax\CinemaxBundle\Entity\Janrs 
     */
    public function getJanr()
    {
        return $this->janr;
    }

    /**
     * Set format
     *
     * @param \Cinemax\CinemaxBundle\Entity\Formats $format
     * @return Discs
     */
    public function setFormat(\Cinemax\CinemaxBundle\Entity\Formats $format = null)
    {
        $this->format = $format;
    
        return $this;
    }

    /**
     * Get format
     *
     * @return \Cinemax\CinemaxBundle\Entity\Formats 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set producer
     *
     * @param \Cinemax\CinemaxBundle\Entity\Producers $producer
     * @return Discs
     */
    public function setProducer(\Cinemax\CinemaxBundle\Entity\Producers $producer = null)
    {
        $this->producer = $producer;
    
        return $this;
    }

    /**
     * Get producer
     *
     * @return \Cinemax\CinemaxBundle\Entity\Producers 
     */
    public function getProducer()
    {
        return $this->producer;
    }

    /**
     * Set translation
     *
     * @param \Cinemax\CinemaxBundle\Entity\Translations $translation
     * @return Discs
     */
    public function setTranslation(\Cinemax\CinemaxBundle\Entity\Translations $translation = null)
    {
        $this->translation = $translation;
    
        return $this;
    }

    /**
     * Get translation
     *
     * @return \Cinemax\CinemaxBundle\Entity\Translations 
     */
    public function getTranslation()
    {
        return $this->translation;
    }

    /**
     * Set type
     *
     * @param \Cinemax\CinemaxBundle\Entity\Types $type
     * @return Discs
     */
    public function setType(\Cinemax\CinemaxBundle\Entity\Types $type = null)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \Cinemax\CinemaxBundle\Entity\Types 
     */
    public function getType()
    {
        return $this->type;
    }

    public function __toString()
    {
        return $this->getName()?$this->getName():"";
    }

    /**
     * Add details
     *
     * @param \Cinemax\CinemaxBundle\Entity\DiscInfo $details
     * @return Discs
     */
    public function addDetail(\Cinemax\CinemaxBundle\Entity\DiscInfo $details)
    {
        $this->details[] = $details;
    
        return $this;
    }

    /**
     * Remove details
     *
     * @param \Cinemax\CinemaxBundle\Entity\DiscInfo $details
     */
    public function removeDetail(\Cinemax\CinemaxBundle\Entity\DiscInfo $details)
    {
        $this->details->removeElement($details);
    }

    /**
     * Get details
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetails()
    {
        return $this->details;
    }
}