<?php

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cinemax\CinemaxBundle\Entity\Visits
 *
 * @ORM\Table(name="visits")
 * @ORM\Entity(repositoryClass="Cinemax\CinemaxBundle\Entity\VisitsRepository")
 */
class Visits
{
    /**
     * @var integer
     *
     * @ORM\Column(name="visit_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $visitId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date", nullable=false)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="hosts", type="integer", nullable=false)
     */
    private $hosts;

    /**
     * @var integer
     *
     * @ORM\Column(name="views", type="integer", nullable=false)
     */
    private $views;



    /**
     * Get visitId
     *
     * @return integer 
     */
    public function getVisitId()
    {
        return $this->visitId;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Visits
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
     * Set hosts
     *
     * @param integer $hosts
     * @return Visits
     */
    public function setHosts($hosts)
    {
        $this->hosts = $hosts;
    
        return $this;
    }

    /**
     * Get hosts
     *
     * @return integer 
     */
    public function getHosts()
    {
        return $this->hosts;
    }

    /**
     * Set views
     *
     * @param integer $views
     * @return Visits
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
}