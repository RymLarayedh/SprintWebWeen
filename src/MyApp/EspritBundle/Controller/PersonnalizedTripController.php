<?php

namespace MyApp\EspritBundle\Controller;

use MyApp\EspritBundle\Entity\Personnalizedtrip;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\Date;


class PersonnalizedTripController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MyAppEspritBundle:Personnalizedtrip:Ptrip.html.twig');
    }


    public function index2Action($name)
    {

        return $this->render('MyAppEspritBundle:Personnalizedtrip:persotrip.html.twig');
    }

    public function findCountriesAction()
    {
        $em = $this->getDoctrine()->getManager();
        $country = $em->getRepository('MyAppEspritBundle:Country')->findAll();
        for ($i = 0; $i < sizeof($country); $i++) {
            $T1[$i] = $country[$i]->getName();
        }
        for ($i = 0; $i < sizeof($country); $i++) {
            $T2[$i] = $country[$i]->getIdcountry();
        }
        $response = new JsonResponse();
        return $response->setData(array('countries' => $T1, 'idcountry' => $T2));


    }


    public function findCitiesAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $country = $em->getRepository('MyAppEspritBundle:Country')->findBy(array('name' => $name));
        $city = $em->getRepository('MyAppEspritBundle:City')->findBy(array('idcountry' => $country[0]->getIdcountry()));
        if ($city) {

            for ($i = 0; $i < sizeof($city); $i++) {
                $T1[$i] = $city[$i]->getName();
            }
            for ($i = 0; $i < sizeof($city); $i++) {
                $T2[$i] = $city[$i]->getIdcity();
            }
        }
        else
        {
            $T1="";
            $T2="";
        }

        $response = new JsonResponse();
        return $response->setData(array('cities' => $T1, 'idcity' => $T2));

    }

    public function addPersoTripAction(Request $request)
    {

        if ($request->isMethod('POST')) {

            $em = $this->getDoctrine()->getManager();
            $personnalizedtrip = new Personnalizedtrip();
            $personnalizedtrip->setDuration($request->get('timeDeparture'));
            $personnalizedtrip->setArrivaldate($request->get('dateDeparture'));
            $personnalizedtrip->setAdults($request->get('adulte'));
            $personnalizedtrip->setChildren($request->get('enfant'));
            $personnalizedtrip->setNumbernights($request->get('budget'));
            $personnalizedtrip->setMail($request->get('email'));


            $country = $em->getRepository("MyAppEspritBundle:Country")->find($request->get('destination'));
            $hotel = $em->getRepository("MyAppEspritBundle:Hotel")->find($request->get('accommodation'));

            $personnalizedtrip->setIdcountry($country);
            $personnalizedtrip->setIdhotel($hotel);
            $em->persist($personnalizedtrip);
            $em->flush();
            //return new Response("hey ".$personnalizedtrip->getChildren());
            return $this->redirectToRoute('my_app_esprit_ptrip');
        }

        return $this->render('MyAppEspritBundle:Personnalizedtrip:Ptrip.html.twig', array());


    }
//////////////////// COMBOBOX HOTEL ///////////////////
    public function findHotelsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $hotel = $em->getRepository('MyAppEspritBundle:Hotel')->findAll();
        for ($i = 0; $i < sizeof($hotel); $i++) {
            $T1[$i] = $hotel[$i]->getName();
        }
        for ($i = 0; $i < sizeof($hotel); $i++) {
            $T2[$i] = $hotel[$i]->getIdhotel();
        }
        $response = new JsonResponse();
        return $response->setData(array('hotels' => $T1, 'idhotel' => $T2));


    }

    ///////////// PRIX HOTEL SELECTED/////////////////////
    public function findPriceHotelAction($name)
    {
        $em = $this->getDoctrine()->getManager();
        $hotel = $em->getRepository('MyAppEspritBundle:Hotel')->findBy(array('name' => $name));
        //$hotel = $em->getRepository('MyAppEspritBundle:Hotel')->findBy(array('pricebynight' => $hotel->getPricebynight()));
        if ($hotel) {

            for ($i = 0; $i < sizeof($hotel); $i++) {
                $T1[$i] = $hotel[$i]->getName();
            }
            for ($i = 0; $i < sizeof($hotel); $i++) {
                $T2[$i] = $hotel[$i]->getPricebynight();
            }
        }
        else
        {
            $T1="";
            $T2="";
        }

        $response = new JsonResponse();
        return $response->setData(array('prices' => $T1, 'pricebynight' => $T2));

    }

}
