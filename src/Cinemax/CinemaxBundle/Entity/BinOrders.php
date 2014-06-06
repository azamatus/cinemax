<?php

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BinOrders
 *
 * @ORM\Table(name="bin_orders")
 * @ORM\Entity(repositoryClass="Cinemax\CinemaxBundle\Entity\BinOrdersRepository")
 */
class BinOrders
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
     * @var integer
     *
     * @ORM\Column(name="amount", type="integer", nullable=true)
     */
    private $amount;

    /**
     * @var float
     *
     * @ORM\Column(name="coast", type="float", nullable=false)
     */
    private $coast;

    /**
     * @var \BinClients
     *
     * @ORM\ManyToOne(targetEntity="BinClients")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="bin_client_id", referencedColumnName="id")
     * })
     */
    private $binClient;

    /**
     * @var \Discs
     *
     * @ORM\ManyToOne(targetEntity="Discs")
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
     * Set amount
     *
     * @param integer $amount
     * @return BinOrders
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    
        return $this;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set coast
     *
     * @param float $coast
     * @return BinOrders
     */
    public function setCoast($coast)
    {
        $this->coast = $coast;
    
        return $this;
    }

    /**
     * Get coast
     *
     * @return float 
     */
    public function getCoast()
    {
        return $this->coast;
    }

    /**
     * Set binClient
     *
     * @param \Cinemax\CinemaxBundle\Entity\BinClients $binClient
     * @return BinOrders
     */
    public function setBinClient(\Cinemax\CinemaxBundle\Entity\BinClients $binClient = null)
    {
        $this->binClient = $binClient;
    
        return $this;
    }

    /**
     * Get binClient
     *
     * @return \Cinemax\CinemaxBundle\Entity\BinClients
     */
    public function getBinClient()
    {
        return $this->binClient;
    }

    /**
     * Set disc
     *
     * @param \Cinemax\CinemaxBundle\Entity\Discs $disc
     * @return BinOrders
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