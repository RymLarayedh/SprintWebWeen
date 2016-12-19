<?php

/**
 * Created by PhpStorm.
 * User: Ines
 * Date: 26/11/2016
 * Time: 17:00
 */


namespace MyApp\EspritBundle\Repository;
use Doctrine\ORM\EntityRepository;
//use Doctrine\ORM\Query\AST\Join;
use Doctrine\ORM\Query\Expr\Join;
class TripprogramRepository extends EntityRepository
{
    public function findPrice()
    {


        return $this->getEntityManager()
            ->createQuery(
                "SELECT v FROM MyAppEspritBundle:Tripprogram v ORDER BY v.price DESC "
            )
            ->getResult();
        // $query=$this->getEntityManager()->createQuery("SELECT v FROM MyAppEspritBundle:Tripprogram v ORDER BY v.price DESC ");

        //  return $query->getResult();

        /*$query=$this->createQueryBuilder('t');
        $query->select('t')
            ->from('MyAppEspritBundle:Tripprogram', 'f')
            ->where('f.idtripprogram = 21');*/


        //  ->orderBy('f.price', 'DESC');
        //$query->where('s.pays=:pays')->setParameter('pays','Allemagne');
        // return $query->getQuery()->getResult();
    }

    public function findByName($id)
    {


        return $this->getEntityManager()
            ->createQuery(
                "SELECT v FROM MyAppEspritBundle:Tripprogram v where v.idcity:=id"
            )->setParameter('id', $id)
            ->getResult();
    }

    public function findByPrice($userid,$budget)
    {
      /*  $query = $this->createQueryBuilder('c');
        $query->select('c')
        ->innerJoin('c.tripprogramlikes', 't', Join::WITH, $query->expr()->eq('t.tripprogram'))
        ->where('c.tripprogramlikes = t.idtripprogram');
       // $query->setParameters(array(
         //   'usernameid' => $userid,
           // 'phone' => $budget
       // )


        $qb = $query->getQuery();
        return $qb->getResult();*/
      /************************************/
$n1=$budget-500;
        $n2=$budget+500;
        return $this->getEntityManager()
            ->createQuery(
                "SELECT t FROM  MyAppEspritBundle:Tripprogram t JOIN 
MyAppEspritBundle:Tripprogramlikes l  WITH l.tripid=t.idtripprogram
    and l.userid=".$userid." WHERE t.price<".$n2." AND
    t.price >".$n1."")
           // )->setParameter('id', $userid)
            ->getResult();



    }
}