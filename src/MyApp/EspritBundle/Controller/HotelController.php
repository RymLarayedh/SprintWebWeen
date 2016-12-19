<?php

namespace MyApp\EspritBundle\Controller;

use MyApp\EspritBundle\Entity\Hotel;
use MyApp\EspritBundle\Form;
use MyApp\EspritBundle\Form\HotelForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class HotelController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

                              /////// ADD HOTEL ACTION //////////

        public function AddHotelAction(Request $request){
            $hotel =new Hotel();
            $em = $this->getDoctrine()->getManager();
            if ($request->isMethod('POST')) {
                $hotel->setName($request->get('name'));
                $hotel->setStars($request->get('stars'));
                $hotel->setRating($request->get('rating'));
                $hotel->setLongitude($request->get('longitude'));
                $hotel->setLatitude($request->get('latitude'));
                $hotel->setPricebynight($request->get('pricebynight'));
                $idaddress = $em->getRepository("MyAppEspritBundle:Address")->find($request->get('idaddress'));
                $hotel->setIdaddress($idaddress);
                $em->persist($hotel);
                $em->flush();
                return $this->redirectToRoute('my_app_esprit_displayhotel');
            }

            return $this->render('@MyAppEsprit/Hotel/addhotel.html.twig', array());


        }


    public function findAddressAction()
    {
        $em = $this->getDoctrine()->getManager();
        $address = $em->getRepository('MyAppEspritBundle:Address')->findAll();
        for ($i = 0; $i < sizeof($address); $i++) {
            $T1[$i] = $address[$i]->getStreet();
        }
        for ($i = 0; $i < sizeof($address); $i++) {
            $T2[$i] = $address[$i]->getIdaddress();
        }
        $response = new JsonResponse();
        return $response->setData(array('addresses' => $T1, 'idaddress' => $T2));

    }
                          ///////// Display Hotel Action /////////////
    function DisplayHotelAction(Request $request)
    {
        $em=$this->getDoctrine()->getManager();
        $hotel=$em->getRepository("MyAppEspritBundle:Hotel")->findAll();
        return $this->render("MyAppEspritBundle:Hotel:displayhotel.html.twig",array('hotel'=>$hotel));
    }
                         ///////// Delete  Hotel Action /////////////
    public function DeleteHotelAction($idhotel)
    {
        $em=$this->getDoctrine()->getManager();
        $hotel = $em->getRepository('MyAppEspritBundle:Hotel')->find($idhotel);
        $em->remove($hotel);
        $em->flush();
        return $this->redirectToRoute('my_app_esprit_displayhotel');
    }
                        ///////// Update  Hotel Action /////////////
    public function UpdateHotelAction(Request $request,$idhotel)
    {
        $em=$this->getDoctrine()->getManager();
        $hotel = $em->getRepository('MyAppEspritBundle:Hotel')->find($idhotel);
        $Form=$this->createForm(HotelForm::class,$hotel);
        $Form->handleRequest($request);
        if($Form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($hotel);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_displayhotel');
        }
        return $this->render('MyAppEspritBundle:Hotel:updatehotel.html.twig',array('formes'=>$Form->createView()));
    }

}

