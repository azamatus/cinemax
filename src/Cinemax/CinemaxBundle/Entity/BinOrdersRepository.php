<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aza
 * Date: 13.09.13
 * Time: 22:34
 * To change this template use File | Settings | File Templates.
 */

namespace Cinemax\CinemaxBundle\Entity;

use Doctrine\ORM\EntityRepository;

class BinOrdersRepository extends EntityRepository{

    public function getClientOrders($id){

        $query = $this->getEntityManager()
            ->createQuery("SELECT b FROM CinemaxBundle:BinOrders b where b.binClient = $id")
            ->getResult();
        return $query;
    }

}