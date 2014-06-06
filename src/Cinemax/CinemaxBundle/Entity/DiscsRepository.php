<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 02.09.13
 * Time: 23:28
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\EntityRepository;


class DiscsRepository extends EntityRepository{

    public function getDiscsById($discsId){

        $em = $this->getEntityManager();
        $repository = $em->getRepository("CinemaxBundle:Discs");
        $qb = $repository->createQueryBuilder('r');
        $query = $qb->add('where', $qb->expr()->in('r.id', array_keys($discsId)))
            ->andWhere('r.active = 1')
            ->getQuery();

        return $query->getResult();
}

    public function getLastUpdatedDiscs(){

        $em = $this->getEntityManager();
        $repostory = $em ->getRepository("CinemaxBundle:Discs");
        $qb = $repostory ->createQueryBuilder('n')
            ->orderBy('n.date','DESC')
            ->setMaxResults(32)
            ->getQuery();

        return $qb->getResult();
    }

    public function doSort($type)
    {
        $em = $this -> getEntityManager();
        $repository = $em -> getRepository("CinemaxBundle:Discs");
        $query = $repository -> createQueryBuilder('s')
            ->select('s')
            ->innerJoin("CinemaxBundle:Types", 't','WITH', 's.type = t.id')
            ->where("t.name = :v")
            ->setParameter('v', $type)
            ->getQuery();

        return $query->getResult();
    }

    public function searchDiscs($searchText){

        $query = $this->createQueryBuilder('q')
            ->orWhere("q.name like :search")
            ->orWhere('q.description like :search')
            //->orWhere('c.value like :search')
            ->andWhere('q.active = 1')
            ->setParameter('search', '%' . $searchText . '%');

        return $query->getQuery();
    }
}