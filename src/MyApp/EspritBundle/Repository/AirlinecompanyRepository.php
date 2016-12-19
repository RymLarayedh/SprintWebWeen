<?php

/**
 * Created by PhpStorm.
 * User: ElarbiMohamedAymen
 * Date: 24/11/2016
 * Time: 12:08
 */
namespace MyApp\EspritBundle\Repository;

use Doctrine\ORM\EntityRepository;

class AirlinecompanyRepository extends EntityRepository
{
    public function RechercheAirline($name)
    {
        $query = $this->getEntityManager()->createQuery("select v from MyAppEspritBundle:Airlinecompany v WHERE v.name like :name ")
            ->setParameter('name','%'.$name.'%');
        return $query->getResult();
    }

    public function RechercheCountry($name)
    {
        $query = $this->getEntityManager()->createQuery("select v from MyAppEspritBundle:Country v WHERE v.name like :name ")
            ->setParameter('name','%'.$name.'%');
        return $query->getResult();
    }

    public function RechercheCity($name)
    {
        $query = $this->getEntityManager()->createQuery("select v from MyAppEspritBundle:City v WHERE v.name like :name ")
            ->setParameter('name','%'.$name.'%');
        return $query->getResult();
    }

    public function GetPermission($airline)
    {
        $em = $this->getEntityManager();
        $Existant = $em->getRepository('MyAppEspritBundle:Airlinecompany')->findAll();
        $currentAddress = $airline->getidaddress()->getnumber().$airline->getidaddress()->getstreet().$airline->getidaddress()->getzipcode().$airline->getidaddress()->getidcity()->getname().$airline->getidaddress()->getidcountry()->getname();
        for($i=0;$i<sizeof($Existant);$i++)
        {
            $tmp = $Existant[$i]->getidaddress()->getnumber().$Existant[$i]->getidaddress()->getstreet().$Existant[$i]->getidaddress()->getzipcode().$Existant[$i]->getidaddress()->getidcity()->getname().$Existant[$i]->getidaddress()->getidcountry()->getname();
            if(strtoupper($tmp)== strtoupper($currentAddress))
            {
                return 1;
            }
        }

        return 0;
    }


}