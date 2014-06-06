<?php

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cinemax\CinemaxBundle\Entity\Ips
 *
 * @ORM\Table(name="ips")
 * @ORM\Entity(repositoryClass="Cinemax\CinemaxBundle\Entity\IpsRepository")
 */
class Ips
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ip_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ipId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_address", type="string", length=50, nullable=false)
     */
    private $ipAddress;



    /**
     * Get ipId
     *
     * @return integer 
     */
    public function getIpId()
    {
        return $this->ipId;
    }

    /**
     * Set ipAddress
     *
     * @param string $ipAddress
     * @return Ips
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;
    
        return $this;
    }

    /**
     * Get ipAddress
     *
     * @return string 
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }
}