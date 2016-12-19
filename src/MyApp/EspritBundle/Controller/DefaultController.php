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
        if ($request->isMethod('POST')) {
            $Airline->setName($request->get('nom'));
            $Address->setNumber($request->get('adnum'));
            $Address->setStreet($request->get('adstr'));
            $Address->setZipcode($request->get('adzip'));

            $Country = $em->getRepository('MyAppEspritBundle:Country')->find(array('idcountry' => $request->get('adcountry')));
            $Address->setIdcountry($Country);
            $City = $em->getRepository('MyAppEspritBundle:City')->find(array('idcity' => $request->get('adcity')));
            $Address->setIdcity($City);
            $Airline->setIdaddress($Address);
            //************** upload de l'image****************
            $Airline->setPicture($request->get('fle'));


            $test = $em->getRepository('MyAppEspritBundle:Airlinecompany')->GetPermission($Airline);
            if ($test == 0) {
                $em->persist($Address);
                $em->flush();
                $em->persist($Airline);
                $em->flush();
                return $this->redirectToRoute('my_app_esprit_Airlinemgmt');
            }
                $this->get('session')->getFlashBag()->add(
                    'errors',
                    'Address exist!');
            return $this->redirectToRoute('my_app_esprit_ajouterAirline');


        }
    }


    public function ShowAirlineAction()
    {
        //ici c'est la methode d'affichage//
        $em = $this->getDoctrine()->getManager();
        $Airline=$em->getRepository('MyAppEspritBundle:Airlinecompany')->findAll();
        $imgs=array();
           foreach ($Airline as $key => $entity)
            {
                if($entity->getPicture() == null)
                {
                    $imgs[$key] = "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";
                }
                else
                {
                    $imgs[$key] = base64_encode(stream_get_contents($entity->getPicture()));
                }


            }

        return $this->render("MyAppEspritBundle:Ween/AirlineCompany:Showairlinecompany.html.twig",array("airlines"=>$Airline,"images"=>$imgs));

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
        if(((int)$request->get('countryval'))!=null)
        {
            $Country = $em->getRepository('MyAppEspritBundle:Country')->find(array('idcountry'=>$request->get('countryval')));
        }
        else
        {
         $Country = $address->getIdcountry();
        }

        if(((int)$request->get('cityval'))!=null)
        {
            $City = $em->getRepository('MyAppEspritBundle:City')->find(array('idcity'=>$request->get('cityval')));
        }
        else
        {
            $City = $address->getIdcity();
        }



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

            $result = $em->getRepository('MyAppEspritBundle:Airlinecompany')->RechercheAirline($txt);
            if($result)
            {
                for($i=0 ; $i<sizeof($result);$i++)
                {
                    $names[$i]=$result[$i]->getName();
                    $ad[$i] = $result[$i]->getIdaddress()->getNumber().", Street ".$result[$i]->getIdaddress()->getStreet().", ".$result[$i]->getIdaddress()->getZipcode()." , ".$result[$i]->getIdaddress()->getIdcity()->getname()." , ".$result[$i]->getIdaddress()->getIdcountry()->getname();
                }
            }
            else
            {
                $names="";
                $ad="";
            }

        }

        elseif ($choixx == 2)//search by city
        {
            $result = $em->getRepository('MyAppEspritBundle:Airlinecompany')->findAll();
            $result1 = $em->getRepository('MyAppEspritBundle:Airlinecompany')->RechercheCity($txt);
            $x=0;
            if($result)
            {
                $names="";
                $ad="";
                for($i=0 ; $i<sizeof($result);$i++) {
                    for($j=0;$j<sizeof($result1);$j++)
                    if (strtoupper($result[$i]->getIdaddress()->getIdcity()->getname())==strtoupper($result1[$j]->getName())) {
                        $names[$x] = $result[$i]->getName();
                        $ad[$x] = $result[$i]->getIdaddress()->getNumber() . ", Street " . $result[$i]->getIdaddress()->getStreet() . ", " . $result[$i]->getIdaddress()->getZipcode() . " , " . $result[$i]->getIdaddress()->getIdcity()->getname() . " , " . $result[$i]->getIdaddress()->getIdcountry()->getname();
                        $x++;
                    }
                }
            }
            else
            {
                $names="";
                $ad="";
            }

        }

        elseif ($choixx == 3) //search by country
        {
            $result = $em->getRepository('MyAppEspritBundle:Airlinecompany')->findAll();
            $result1 = $em->getRepository('MyAppEspritBundle:Airlinecompany')->RechercheCountry($txt);
            $x=0;
            if($result)
            {
                for($i=0 ; $i<sizeof($result);$i++) {
                    for($j=0;$j<sizeof($result1);$j++) {

                        if (strtoupper($result[$i]->getIdaddress()->getIdcountry()->getname()) == strtoupper($result1[$j]->getName())) {
                            $names[$x] = $result[$i]->getName();
                            $ad[$x] = $result[$i]->getIdaddress()->getNumber() . ", Street " . $result[$i]->getIdaddress()->getStreet() . ", " . $result[$i]->getIdaddress()->getZipcode() . " , " . $result[$i]->getIdaddress()->getIdcity()->getname() . " , " . $result[$i]->getIdaddress()->getIdcountry()->getname();
                            $x++;
                        }
                    }
                }
            }
            else
            {
                $names="";
                $ad="";
            }


        }

      /*  else
        {
            $names="";
            $ad="";

        $response = new JsonResponse();
        return $response->setData(array('res'=>$names,'ad'=>$ad));

        }*/
        $response = new JsonResponse();
        return $response->setData(array('res'=>$names,'ad'=>$ad));

    }




}

