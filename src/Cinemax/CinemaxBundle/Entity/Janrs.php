<?php

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Janrs
 *
 * @ORM\Table(name="janrs")
 * @ORM\Entity
 */
class Janrs
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
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="\Cinemax\VideosBundle\Entity\Movies", mappedBy="janrs")
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
     * @return Janrs
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

    public function __toString()
    {
        return $this->getName()?$this->getName():"";
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
     * @return Janrs
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
}