<?php
/**
 * Created by PhpStorm.
 * User: rymlarayedh
 * Date: 20/11/2016
 * Time: 21:29
 */

namespace MyApp\EspritBundle\Entity;

use Doctrine\ORM\EntityRepository;

class FriendsRepository extends EntityRepository
{
    public function findMyFriendsDQL($idfu){
        $query=$this->getEntityManager()
            ->createQuery("SELECT f from MyAppEspritBundle:Friends f WHERE f.userid=:s AND f.status=1")
            ->setParameter('s',$idfu);
        $obj = $query->getResult();
        return $obj;
    }

    public function findInvitationsDQL($idfu){
        $query=$this->getEntityManager()
            ->createQuery("SELECT f from MyAppEspritBundle:Friends f WHERE f.friendid=:s AND f.status=0")
            ->setParameter('s',$idfu);
        $obj = $query->getResult();
        return $obj;
    }
    public function countInvitationsDQL($idfu){
        $query=$this->getEntityManager()
            ->createQuery("SELECT COUNT(f.idfu) from MyAppEspritBundle:Friends f WHERE f.friendid=:s AND f.status=0")
            ->setParameter('s',$idfu);
        $obj = $query->getSingleScalarResult();
        return $obj;
    }
    public function findAcceptedFriendFDQL($idfu){
        $query=$this->getEntityManager()
            ->createQuery("SELECT (f.friendid) from MyAppEspritBundle:Friends f WHERE f.idfu=:s")
        ->setParameter('s',$idfu);
        $obj = $query->getSingleScalarResult();
        return $obj;
    }
    public function findAcceptedFriendUDQL($idfu){
        $query=$this->getEntityManager()
            ->createQuery("SELECT (f.userid) from MyAppEspritBundle:Friends f WHERE f.idfu=:s")
            ->setParameter('s',$idfu);
        $obj = $query->getSingleScalarResult();
        return $obj;
    }

    public function findFUDQL($a,$b){
        $query=$this->getEntityManager()
            ->createQuery("SELECT (f.idfu) from MyAppEspritBundle:Friends f WHERE f.userid=:s AND f.friendid=:t ")
            ->setParameter('s',$a)
            ->setParameter('t',$b);
        $obj = $query->getSingleScalarResult();
        return $obj;
    }

    public function deleteDQL($a,$b)
    {
        $query=$this->getEntityManager()
            ->createQuery("DELETE MyAppEspritBundle:Friends f WHERE f.userid=:s AND f.friendid=:t")
            ->setParameter('s',$a)
            ->setParameter('t',$b);

        $query->execute();
    }

    public function existDQL($a,$b){
        $query=$this->getEntityManager()
            ->createQuery("SELECT COUNT(f.idfu) from MyAppEspritBundle:Friends f WHERE f.userid=:s AND f.friendid=:t ")
            ->setParameter('s',$a)
            ->setParameter('t',$b);
        $obj = $query->getSingleScalarResult();
        return $obj;
    }






}