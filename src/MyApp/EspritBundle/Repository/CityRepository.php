<?php
/**
 * Created by PhpStorm.
 * User: ElarbiMohamedAymen
 * Date: 25/11/2016
 * Time: 08:27
 */

namespace MyApp\EspritBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CityRepository extends EntityRepository
{
    public function GetCityID($country,$city)
    {
        $query = $this->getEntityManager()->createQuery("select v from MyAppEspritBundle:City v WHERE v.name =:name AND v.idcountry=:idc")
            ->setParameter('name',$city)
            ->setParameter('idc',$country);
        return $query->getResult();
    }

}