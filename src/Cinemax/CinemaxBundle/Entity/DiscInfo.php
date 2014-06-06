<?php

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DiscInfo
 *
 * @ORM\Table(name="disc_info")
 * @ORM\Entity
 */
class DiscInfo
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
     * @ORM\Column(name="content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var Discs
     *
     * @ORM\ManyToOne(targetEntity="Discs", inversedBy="details")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="disc_id", referencedColumnName="id")
     * })
     */
    private $disc;



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
     * Set content
     *
     * @param string $content
     * @return DiscInfo
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set disc
     *
     * @param \Cinemax\CinemaxBundle\Entity\Discs $disc
     * @return DiscInfo
     */
    public function setDisc(\Cinemax\CinemaxBundle\Entity\Discs $disc = null)
    {
        $this->disc = $disc;
    
        return $this;
    }

    /**
     * Get disc
     *
     * @return \Cinemax\CinemaxBundle\Entity\Discs 
     */
    public function getDisc()
    {
        return $this->disc;
    }
}