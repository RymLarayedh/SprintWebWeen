<?php
/**
 * Created by PhpStorm.
 * User: rymlarayedh
 * Date: 21/11/2016
 * Time: 18:18
 */

namespace MyApp\EspritBundle\Entity;


use Doctrine\ORM\EntityRepository;

class UtilisateurRepository extends EntityRepository
{
    public function displayWeenersDQL(){
        $query=$this->getEntityManager()
            ->createQuery("SELECT f from MyAppEspritBundle:User f");
        $obj = $query->getResult();
        return $obj;
    }

}