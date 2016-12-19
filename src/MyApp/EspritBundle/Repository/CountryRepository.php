<?php
/**
 * Created by PhpStorm.
 * User: ElarbiMohamedAymen
 * Date: 25/11/2016
 * Time: 08:27
 */

namespace MyApp\EspritBundle\Repository;
use Doctrine\ORM\EntityRepository;

class CountryRepository extends EntityRepository
{
    public function GetId($country)
    {
        $query = $this->getEntityManager()->createQuery("select v from MyAppEspritBundle:Country v WHERE v.name =: name ")
            ->setParameter('name', $country);
        return $query->getResult();
    }
}