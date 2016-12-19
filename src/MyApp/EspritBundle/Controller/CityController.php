<?php

namespace MyApp\EspritBundle\Controller;

use FOS\UserBundle \Entity\User;
use MyApp\EspritBundle\Entity\City;
use MyApp\EspritBundle\Entity\Country;
//use MyApp\EspritBundle\Entity\Tripprogramlikes;
use MyApp\EspritBundle\Entity\Utilisateur;
use MyApp\EspritBundle\Form\CityForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CityController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    function AjoutAction(Request $request)
    {
        $city = new City();
        $Form = $this->createForm(CityForm::class, $city);
        $Form->handleRequest($request);
        if ($Form->isValid()) // isset de php
        {
            $em = $this->getDoctrine()->getManager(); // em entity manager , liaison avec la base
            $em->persist($city); // insert into  // persist et flush on dirait on a executé des requetes sql
            $em->flush(); // le push , synchroniser les données avec la base de données
            return $this->redirectToRoute('my_app_esprit_AfficheCity');
        }

        return $this->render('MyAppEspritBundle:City:City.html.twig', array('formes' => $Form->createView()));

    }

    public function afficheAction()
    {
        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository("MyAppEspritBundle:City")->findAll();
        return $this->render("MyAppEspritBundle:City:Cityaffiche.html.twig", array('city' => $city));

    }

    public function DeleteAction(Request $request, $idcity)
    {
        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository('MyAppEspritBundle:City')->find($idcity);
        $em->remove($city);
        $em->flush();
        return $this->redirectToRoute('my_app_esprit_AfficheCity');
    }

    public function UpdateAction(Request $request, $idcity)
    {
        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository('MyAppEspritBundle:City')->find($idcity);

        $Form = $this->createForm(CityForm::class, $city);
        $Form->handleRequest($request);
        if ($Form->isValid()) {
            $em->persist($city); // insert into  // persist et flush on dirait on a executé des requetes sql
            $em->flush(); // le push , synchroniser les données avec la base de données
            return $this->redirectToRoute('my_app_esprit_AfficheCity');
        }
        return $this->render('MyAppEspritBundle:City:City.html.twig', array('formes' => $Form->createView()));


    }

    public function SearchAction(Request $request)
    {
        $ref = $request->get('name');
        $em = $this->getDoctrine()->getManager();
        $city = $em->getRepository('MyAppEspritBundle:City')->findBy(array('name' => $ref));
        return $this->render("MyAppEspritBundle:City:Cityaffiche.html.twig", array('city' => $city));
    }

}