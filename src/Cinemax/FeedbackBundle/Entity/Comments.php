<?php

namespace Cinemax\FeedbackBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comments
 *
 * @ORM\Table(name="comments")
 * @ORM\Entity
 */
class Comments
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
     * @ORM\Column(name="author", type="string", length=255, nullable=false)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=false)
     */
    private $comment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="date", nullable=false)
     */
    private $created;

    /**
     * @var Movie
     * @ORM\ManyToOne(targetEntity="\Cinemax\VideosBundle\Entity\Movies", inversedBy="comment")
     */
    private $movie;

    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean", nullable=true)
     */
    private $active;

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
     * Set author
     *
     * @param string $author
     * @return Comments
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Comments
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
     * Set created
     *
     * @param \DateTime $created
     * @return Comments
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

    /**
     * Set movie
     *
     * @param \Cinemax\VideosBundle\Entity\Movies $movie
     * @return Comments
     */
    public function setMovie(\Cinemax\VideosBundle\Entity\Movies $movie = null)
    {
        $this->movie = $movie;
    
        return $this;
    }

    /**
     * Get movie
     *
     * @return \Cinemax\VideosBundle\Entity\Movies
     */
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Comments
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

}