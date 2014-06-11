<?php
/**
 * Created by PhpStorm.
 * User: Aza
 * Date: 11.06.14
 * Time: 13:48
 */

namespace Cinemax\VideosBundle\Entity;

use Doctrine\ORM\EntityRepository;

class MoviesRepository extends EntityRepository{

    public function searchMovies($searchText){

        $query = $this->createQueryBuilder('q')
            ->orWhere("q.name like :search")
            //->orWhere('c.value like :search')
            ->andWhere('q.active = 1')
            ->setParameter('search', '%' . $searchText . '%');

        return $query->getQuery();
    }

    public function incrementViews($movieId)
    {
        $this->createQueryBuilder('g')
            ->update('CinemaxVideosBundle:Movies', 'g')
            ->set('g.views', 'g.views + 1')
            ->where('g.id = :id')
            ->setParameter('id', $movieId)
            ->getQuery()->execute();
    }
} 