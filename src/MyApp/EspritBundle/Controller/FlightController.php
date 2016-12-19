<?php

namespace MyApp\EspritBundle\Controller;

use Doctrine\DBAL\Types\DateType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\SubmitButtonTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use MyApp\EspritBundle\Entity\Flight;
use MyApp\EspritBundle\Form\FlightForm;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Constraints\Date;


class FlightController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }
    public function displayFlightAction(Request $request)
    {

        /*   $Id = $request->get('Id');
           $arrivaldate = $request->get('arrivaldate');
           $departuredate = $request->get('departuredate');
           $arrivaltime= $request->get('arrivaltime');
           $departuretime= $request->get('departuretime');
           $price= $request->get('price');
           $idairlinecompany= $request->get('idairlinecompany');
           $idarrivalcity= $request->get('idarrivalcity');
         //  $Marque = $request->get('Marque');

           return $this->render('FlightBundle::displayFlight.html.twig',array('Id'=>$Id,'arrivaldate'=>$arrivaldate,'departuredate'=>$departuredate,'price'=>$price));
       }*/


        $em = $this->getDoctrine()->getManager();
        $flight = $em->getRepository("MyAppEspritBundle:Flight")->findAll();
        return $this->render("@MyAppEsprit/Ween/Flights/displayFlight.html.twig", array('flight' => $flight));
    }
    /*  public function getFlightInfoAction(Request $request, $id)
      {

          $em = $this->getDoctrine()->getManager();
          $flight = $em->getRepository("FlightBundle:Flight")->find($id);

          return $this->render('FlightBundle:Flight:updateFlight.html.twig', array("flight" => $flight));
      }*/
    public function updateFlightAction(Request $request, $id)
    {

        /*     $em = $this->getDoctrine()->getManager();
             $flight = $em->getRepository("FlightBundle:Flight")->find($id);
             if ($request->isMethod('POST')) {
              //   $flight->setArrivaldate($request->get('arrivaldate'));
              //   $flight->setDeparturedate($request->get('departuredate'));
                // $flight->setArrivaltime($request->get('arrivaltime'));
               //  $flight->setDeparturetime($request->get('departuretime'));
             //   $flight->setIdarrivalcity($request->get('idarrivalcity'));
               // $flight->setIddeparturecity($request->get('iddeparturecity'));
                 $flight->setPrice($request->get('price'));

                 $em->persist($flight);
                 $em->flush();
             }
             return $this->redirectToRoute('flight_displayFlight');*/

        $em=$this->getDoctrine()->getManager();
        $flight=$em->getRepository('MyAppEspritBundle:Flight')->find($id);

        $Form=$this->createForm(FlightForm::class,$flight)
            ->add('Update',SubmitType::class);
        $Form->handleRequest($request);
        if($Form->isValid())
        {
            $em->persist($flight); // insert into  // persist et flush on dirait on a executé des requetes sql
            $em->flush(); // le push , synchroniser les données avec la base de données
            return   $this->redirectToRoute('my_app_esprit_displayFlight');
        }
        return $this->render('@MyAppEsprit/Ween/Flights/updateFlight.html.twig',array('formes'=>$Form->createView()));

    }
    public function deleteFlightAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $flight=$em->getRepository('MyAppEspritBundle:Flight')->find($id);
        $em->remove($flight);
        $em->flush();
        return $this->redirectToRoute('my_app_esprit_displayFlight');
    }
    public function addFlightAction(Request $request)
    {
       /* $flight= new Flight();
        $form=$this->createForm(FlightForm::class,$flight)
            ->add('Add',SubmitType::class);


        $form->handleRequest ($request);
        if($form->isValid()) // isset de php
        {
            $em=$this->getDoctrine()->getManager(); // em entity manager , liaison avec la base
            $em->persist($flight); // insert into  // persist et flush on dirait on a executé des requetes sql
            $em->flush(); // le push , synchroniser les données avec la base de données
            return $this->redirectToRoute('my_app_esprit_displayFlight');

        }
        return $this->render('@MyAppEsprit/Ween/Flights/addFlight.html.twig',array('formes'=>$form->createView()));*/
        $flight = new Flight();
        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $city = $em->getRepository("MyAppEspritBundle:City")->findOneBy(array('idcity' => $request->get('city')));
            $city2 = $em->getRepository("MyAppEspritBundle:City")->findOneBy(array('idcity' => $request->get('city2')));

            $flight->setIddeparturecity($city );
            $flight->setIdarrivalcity($city2);
            $arrivaldate=$request->get('arrivaldate');
          //  $departuredate=$request->get('d');
            $arrivaltime=$request->get('arrivaltime');
            $departuretime=$request->get('departuretime');
//echo $departuredate;
//echo $departuredate;

            $date1=new \DateTime($arrivaldate);

            $time1=new \DateTime($arrivaltime);
            $time2=new \DateTime($departuretime);
           // $date2=new \DateTime($departuredate);



           $flight->setArrivaldate($date1);
            $flight->setArrivaltime($time1);
           $flight->setDeparturedate(new \DateTime($request->get('arrivaltime')));
                $flight->setDeparturetime($time2);

            $flight->setPrice(0);
            $airline = $em->getRepository("MyAppEspritBundle:Airlinecompany")->findOneBy(array('idairlinecompany' => $request->get('airline')));

            $flight->setIdairlinecompany($airline);




            $em->persist($flight);
            $em->flush();
           // return $this->redirectToRoute('my_app_esprit_displayFlight');
        }

        return $this->render('MyAppEspritBundle:Ween/Flights:addFlight.html.twig', array());

    }
    public function findairlineAction()
    {
        $em = $this->getDoctrine()->getManager();
        $airline = $em->getRepository('MyAppEspritBundle:Airlinecompany')->findAll();
        for ($i = 0; $i < sizeof($airline); $i++) {
            $T1[$i] = $airline[$i]->getName();
        }
        for ($i = 0; $i < sizeof($airline); $i++) {
            $T2[$i] = $airline[$i]->getIdairlinecompany();
        }
        $response = new JsonResponse();
        return $response->setData(array('airlines' => $T1, 'idairline' => $T2));

    }
}
