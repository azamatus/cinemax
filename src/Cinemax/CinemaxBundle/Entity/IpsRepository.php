<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 05.01.14
 * Time: 22:48
 */

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\EntityRepository;

class IpsRepository extends EntityRepository{

    public function clearIps(){

        return $this->createQueryBuilder('ch')
            ->delete()
            ->getQuery()
            ->getResult();
    }

    public function getIp($visitor_ip){

        return $this->createQueryBuilder('i')
            ->select('i')
            ->where('i.ipAddress=:a')
            ->setParameter('a',$visitor_ip)
            ->getQuery()
            ->getResult();
    }
//
//    public function insertIp($visitor_ip){
//        $query = $this->getEntityManager()
//            ->createQuery("INSERT INTO CinemaxBundle:Ips i SET i.ipAddress = $visitor_ip")
//            ->getResult();
//        return $query;
//    }
//    public function updateIpAddress($visitor_ip){
//
//        return $this->createQueryBuilder('i')
//            ->update()
//            ->set('i.ipAddress', $visitor_ip)
//            ->
//    }

} 