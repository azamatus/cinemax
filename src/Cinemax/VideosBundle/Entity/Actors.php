<?php

namespace Cinemax\VideosBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Actors
 *
 * @ORM\Table(name="actors")
 * @ORM\Entity
 */
class Actors
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;


    /**
     * @ORM\ManyToMany(targetEntity="Movies", mappedBy="actors")
     */
    protected $movies;
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
     * @return Actors
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
     * Constructor
     */
    public function __construct()
    {
        $this->movies = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add movies
     *
     * @param \Cinemax\VideosBundle\Entity\Movies $movies
     * @return Actors
     */
    public function addMovie(\Cinemax\VideosBundle\Entity\Movies $movies)
    {
        $this->movies[] = $movies;
    
        return $this;
    }

    /**
     * Remove movies
     *
     * @param \Cinemax\VideosBundle\Entity\Movies $movies
     */
    public function removeMovie(\Cinemax\VideosBundle\Entity\Movies $movies)
    {
        $this->movies->removeElement($movies);
    }

    /**
     * Get movies
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMovies()
    {
        return $this->movies;
    }
    public function __toString()
    {
        return $this->getName()?$this->getName():"";
    }
}