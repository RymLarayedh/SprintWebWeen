<?php

namespace MyApp\EspritBundle\Controller;

use MyApp\EspritBundle\Entity\Address;
use MyApp\EspritBundle\Entity\Airlinecompany;
use MyApp\EspritBundle\Entity\City;
use MyApp\EspritBundle\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('MyAppEspritBundle::layout.html.twig');
    }
    public function signinAction()
    {
        return $this->redirectToRoute("fos_user_security_login");
    }

    public function signupAction()
    {
        return $this->redirectToRoute("fos_user_registration_register");
    }

    public function ClientAction()
    {
        return $this->render("MyAppEspritBundle:redirection:client.html.twig");
    }


    public function AdminAction()
    {
        return $this->render("MyAppEspritBundle:redirection:admin.html.twig");
    }



    public function dashAction()
    {

        return $this->render("MyAppEspritBundle:redirection:admin.html.twig");
    }

    public function dasheAction()
    {

        return $this->render("MyAppEspritBundle:Ween/User:accueiladmin.html.twig");
    }

    ///AirLineCompany///

    public function AirlinemgtAction()
    {
        return $this->render('MyAppEspritBundle:Ween/AirlineCompany:managment.html.twig',array());
    }

    public function ToAjouterAirlineAction()
    {
        return $this->render('MyAppEspritBundle:Ween/AirlineCompany:AddAirlineCompany.html.twig',array());

    }

    public function AllCountriesShAction()
    {
        $em = $this->getDoctrine()->getManager();
        $country = $em->getRepository('MyAppEspritBundle:Country')->findAll();

            for($i=0;$i<sizeof($country);$i++)
            {
                $v[$i] = $country[$i]->getName();

            }
            for($i=0;$i<sizeof($country);$i++)
            {
                $idc[$i] = $country[$i]->getIdcountry();

            }
        $response = new JsonResponse();
        return $response->setData(array('countries'=>$v,'idc'=>$idc));
    }


    public function CityShAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository('MyAppEspritBundle:City')->findBy(array('idcountry'=>$id));

        if($city)
        {
            for($i=0;$i<sizeof($city);$i++)
            {
                $v[$i] = $city[$i]->getName();

            }
            for($i=0;$i<sizeof($city);$i++)
            {
                $idc[$i] = $city[$i]->getIdcity();

            }

        }

        else
        {
            $v="";
            $idc=0;
        }
        $response = new JsonResponse();
        return $response->setData(array('city'=>$v,'idc'=>$idc));
    }


    public function AjouterAirlineAction(Request $request)
    {
        //ici c'est la methode d'ajout//
        $Airline = new Airlinecompany();
        $Address = new Address();
        $City = new City();
        $Country = new Country();
        $em = $this->getDoctrine()->getManager();
        if($request->isMethod('POST')){
            $Airline->setName($request->get('nom'));
            $Address->setNumber($request->get('adnum'));
            $Address->setStreet($request->get('adstr'));
            $Address->setZipcode($request->get('adzip'));

            $Country = $em->getRepository('MyAppEspritBundle:Country')->find(array('idcountry'=>$request->get('adcountry')));
            $Address->setIdcountry($Country);
            $City = $em->getRepository('MyAppEspritBundle:City')->find(array('idcity'=>$request->get('adcity')));
            $Address->setIdcity($City);
            $Airline->setIdaddress($Address);
            $em->persist($Address);
            $em->flush();
            $em->persist($Airline);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_Airlinemgmt');
        }
        return $this->redirectToRoute('my_app_esprit_Airlinemgmt');

    }

    public function ShowAirlineAction()
    {
        //ici c'est la methode d'affichage//
        $em = $this->getDoctrine()->getManager();
        $Airline=$em->getRepository('MyAppEspritBundle:Airlinecompany')->findAll();

        return $this->render("MyAppEspritBundle:Ween/AirlineCompany:Showairlinecompany.html.twig",array("airlines"=>$Airline));

    }
    public function DeleteAirlineAction($idairlinecompany)
    {
        //ici c'est la methode de suppression//
        $em = $this->getDoctrine()->getManager();
        $airline = $em->getRepository("MyAppEspritBundle:Airlinecompany")->find($idairlinecompany);
        $address = $em->getRepository("MyAppEspritBundle:Address")->find($airline->getIdaddress());
        $em->remove($airline);
        $em->flush();
        $em->remove($address);
        $em->flush();
        return $this->redirectToRoute('my_app_esprit_showallairline');
    }

    public function UpdateAirlineShowAction($idairlinecompany)
    {
        $em = $this->getDoctrine()->getManager();
        $airline = $em->getRepository("MyAppEspritBundle:Airlinecompany")->find($idairlinecompany);
        return $this->render("MyAppEspritBundle:Ween/AirlineCompany:UpdateAirlinecompany.html.twig",array("airlines"=>$airline));


    }

    public function UpdateAirlineAction(Request $request ,$Id)
    {

        $airline = new Airlinecompany();
        $address = new Address();
        $city = new City();
        $country = new Country();
        $em = $this->getDoctrine()->getManager();
        $airline = $em->getRepository("MyAppEspritBundle:Airlinecompany")->find($Id);
        $address = $em->getRepository("MyAppEspritBundle:Address")->find($airline->getIdaddress());
        $Country = $em->getRepository('MyAppEspritBundle:Country')->find(array('idcountry'=>$request->get('countryval')));
        $City = $em->getRepository('MyAppEspritBundle:City')->find(array('idcity'=>$request->get('cityval')));

        if($request->isMethod('POST')){
           $airline->setName($request->get('nname'));
            $em->persist($airline);
            $em->flush();
            $address->setNumber($request->get('nnumber'));
            $address->setStreet($request->get('nstr'));
            $address->setZipcode($request->get('nzip'));
            $address->setIdcity($City);
            $address->setIdcountry($Country);
            $em->persist($address);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_showallairline');
        }

        return $this->redirectToRoute('my_app_esprit_showallairline');
    }

    public function FindAirlineAction()
    {
        $em = $this->getDoctrine()->getManager();
        $Airline=$em->getRepository('MyAppEspritBundle:Airlinecompany')->findAll();
        return $this->render('MyAppEspritBundle:Ween/AirlineCompany:Searchairlinecompany.html.twig',array("airlines"=>$Airline));
    }

    public function FilterAction($choix)
    {
        $txt = substr($choix,1,strlen($choix));
        $choixx = substr($choix,0,1);
        $em = $this->getDoctrine()->getManager();
        if($choixx == 1)//search by name
        {

            $result = $em->getRepository('MyAppEspritBundle:Airlinecompany')->findBy(array('name'=>$txt));

        }

        elseif ($choixx == 2)//search by country
        {
            $city = $em->getRepository('MyAppEspritBundle:City')->findBy(array('name'=>$txt));
            $address = $em->getRepository('MyAppEspritBundle:Address')->findBy(array('idcity'=>$city->getIdcity()));
            $result = $em->getRepository('MyAppEspritBundle:Airlinecompany')->findBy(array('idaddress'=>$address->getIdaddress()));

        }

        elseif ($choixx == 3) //search by city
        {

        }

        else{

        }
        if($result)
        {
            for($i=0 ; $i<sizeof($result);$i++)
            {
                $names[$i]=$result[$i]->getName();
            }
        }
        else
        {
            $names="";
        }


        $response = new JsonResponse();
        return $response->setData(array('res'=>$names));

    }


}

