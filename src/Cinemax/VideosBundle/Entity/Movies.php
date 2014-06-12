<?php

namespace Cinemax\VideosBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Movies
 *
 * @ORM\Table(name="movies")
 * @ORM\Entity(repositoryClass="Cinemax\VideosBundle\Entity\MoviesRepository")
 */
class Movies
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->janrs = new ArrayCollection();
        $this->comment = new ArrayCollection();
    }


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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=true)
     */
    private $views;

    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=true)
     */
    private $year;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\Application\Sonata\MediaBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poster_id", referencedColumnName="id")
     * })
     */
    private $poster;

    /**
     * @ORM\ManyToMany(targetEntity="\Cinemax\CinemaxBundle\Entity\Janrs", inversedBy="movies")
     * @ORM\JoinTable(name="movies_janrs")
     */
    protected  $janrs;


    /**
     * @ORM\ManyToMany(targetEntity="\Cinemax\CinemaxBundle\Entity\Countries", inversedBy="movies")
     * @ORM\JoinTable(name="movies_countries")
     */
    protected $countries;

    /**
     * @ORM\ManyToMany(targetEntity="Actors", inversedBy="movies")
     * @ORM\JoinTable(name="movies_actors")
     */
    protected $actors;

    /**
     * @ORM\ManyToMany(targetEntity="Directors", inversedBy="movies")
     * @ORM\JoinTable(name="movies_directors")
     */
    protected $directors;

    /**
     * @var Comment
     * @ORM\OneToMany(targetEntity="\Cinemax\FeedbackBundle\Entity\Comments", mappedBy="movie", cascade={"persist"})
     */
    private $comment;

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
     * @return Movies
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
     * Set url
     *
     * @param string $url
     * @return Movies
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Movies
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
     * Set views
     *
     * @param integer $views
     * @return Movies
     */
    public function setViews($views)
    {
        $this->views = $views;
    
        return $this;
    }

    /**
     * Get views
     *
     * @return integer 
     */
    public function getViews()
    {
        return $this->views;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Movies
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
        return $this->active;
    }

    /**
     * Set poster
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $poster
     * @return Movies
     */
    public function setPoster(\Application\Sonata\MediaBundle\Entity\Media $poster = null)
    {
        $this->poster = $poster;
    
        return $this;
    }

    /**
     * Get poster
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * Add janrs
     *
     * @param \Cinemax\CinemaxBundle\Entity\Janrs $janrs
     * @return Movies
     */
    public function addJanr(\Cinemax\CinemaxBundle\Entity\Janrs $janrs)
    {
        $this->janrs[] = $janrs;
    
        return $this;
    }

    /**
     * Remove janrs
     *
     * @param \Cinemax\CinemaxBundle\Entity\Janrs $janrs
     */
    public function removeJanr(\Cinemax\CinemaxBundle\Entity\Janrs $janrs)
    {
        $this->janrs->removeElement($janrs);
    }

    /**
     * Get janrs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getJanrs()
    {
        return $this->janrs;
    }

    /**
     * Add countries
     *
     * @param \Cinemax\CinemaxBundle\Entity\Countries $countries
     * @return Movies
     */
    public function addCountrie(\Cinemax\CinemaxBundle\Entity\Countries $countries)
    {
        $this->countries[] = $countries;
    
        return $this;
    }

    /**
     * Remove countries
     *
     * @param \Cinemax\CinemaxBundle\Entity\Countries $countries
     */
    public function removeCountrie(\Cinemax\CinemaxBundle\Entity\Countries $countries)
    {
        $this->countries->removeElement($countries);
    }

    /**
     * Get countries
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCountries()
    {
        return $this->countries;
    }

    /**
     * Add actors
     *
     * @param \Cinemax\VideosBundle\Entity\Actors $actors
     * @return Movies
     */
    public function addActor(\Cinemax\VideosBundle\Entity\Actors $actors)
    {
        $this->actors[] = $actors;
    
        return $this;
    }

    /**
     * Remove actors
     *
     * @param \Cinemax\VideosBundle\Entity\Actors $actors
     */
    public function removeActor(\Cinemax\VideosBundle\Entity\Actors $actors)
    {
        $this->actors->removeElement($actors);
    }

    /**
     * Get actors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActors()
    {
        return $this->actors;
    }

    /**
     * Set year
     *
     * @param integer $year
     * @return Movies
     */
    public function setYear($year)
    {
        $this->year = $year;
    
        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Add directors
     *
     * @param \Cinemax\VideosBundle\Entity\Directors $directors
     * @return Movies
     */
    public function addDirector(\Cinemax\VideosBundle\Entity\Directors $directors)
    {
        $this->directors[] = $directors;
    
        return $this;
    }

    /**
     * Remove directors
     *
     * @param \Cinemax\VideosBundle\Entity\Directors $directors
     */
    public function removeDirector(\Cinemax\VideosBundle\Entity\Directors $directors)
    {
        $this->directors->removeElement($directors);
    }

    /**
     * Get directors
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDirectors()
    {
        return $this->directors;
    }

    /**
     * Add comment
     *
     * @param \Cinemax\FeedbackBundle\Entity\Comments $comment
     * @return Movies
     */
    public function addComment(\Cinemax\FeedbackBundle\Entity\Comments $comment)
    {
        $this->comment[] = $comment;
    
        return $this;
    }

    /**
     * Remove comment
     *
     * @param \Cinemax\FeedbackBundle\Entity\Comments $comment
     */
    public function removeComment(\Cinemax\FeedbackBundle\Entity\Comments $comment)
    {
        $this->comment->removeElement($comment);
    }

    /**
     * Get comment
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComment()
    {
        return $this->comment;
    }
}