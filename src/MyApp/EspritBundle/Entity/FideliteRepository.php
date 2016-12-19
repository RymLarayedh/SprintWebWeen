<?php
/**
 * Created by PhpStorm.
 * User: rymlarayedh
 * Date: 27/11/2016
 * Time: 15:44
 */

namespace MyApp\EspritBundle\Entity;


use Doctrine\ORM\EntityRepository;

class FideliteRepository extends EntityRepository
{
    public function findDQL($id){
        $query=$this->getEntityManager()
            ->createQuery("SELECT (f.fideliteid) from MyAppEspritBundle:Fidelite f WHERE f.userid=:s AND f.vu=0")
            ->setParameter('s',$id);
        $obj = $query->getSingleScalarResult();
        return $obj;
    }

    public function existDQL($id){
        $query=$this->getEntityManager()
            ->createQuery("SELECT COUNT(f.fideliteid) from MyAppEspritBundle:Fidelite f WHERE f.userid=:s AND f.vu=0")
            ->setParameter('s',$id);
        $obj = $query->getSingleScalarResult();
        return $obj;
    }

}