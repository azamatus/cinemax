<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 05.01.14
 * Time: 21:49
 */

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\EntityRepository;


class VisitsRepository extends  EntityRepository{

  public function getIdByDate($date){

    return $this -> createQueryBuilder('i')
            ->select('i.visitId')
            ->where('i.date=:v')
            ->setParameter('v', $date->format('Y-m-d'))
            ->getQuery()
            ->getResult();
    }

//    public function insertVisit($date, $host_counter, $view_counter){
//        $query = $this->getEntityManager()
//            ->createQuery("INSERT INTO CinemaxBundle:Visits v SET v.date = $date, v.hosts=$host_counter, v.views = $view_counter ")
//            ->getResult();
//        return $query;
//    }
    public function updateViews($date){

        return $this -> createQueryBuilder('v')
            ->update('CinemaxBundle:Visits', 'v')
//            ->set('v.date',$date)
//            ->set('v.hosts', 1)
            ->set('v.views','v.views + 1')
            ->where('v.date=:d')
            ->setParameter('d',$date->format('Y-m-d'))
            ->getQuery()
            ->execute();
//        $query = $this->getEntityManager()
//            ->createQuery("UPDATE CinemaxBundle:Visits v SET v.view+1 where v.date = $date")
//            ->getResult();
//        return $query;
    }

    public function updateHosts($date){

        return $this -> createQueryBuilder('h')
            ->update('CinemaxBundle:Visits', 'h')
            ->set('h.hosts', 'h.hosts + 1')
            ->set('h.views','h.views + 1')
            ->where('h.date=:d')
            ->setParameter('d',$date->format('Y-m-d'))
            ->getQuery()
            ->execute();
    }
}