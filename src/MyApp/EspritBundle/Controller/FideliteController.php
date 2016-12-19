<?php

namespace MyApp\EspritBundle\Controller;

//use FOS\UserBundle\Entity\User;
use MyApp\EspritBundle\Entity\City;
use MyApp\EspritBundle\Entity\Country;
//use MyApp\EspritBundle\Entity\Tripprogramlikes;
use MyApp\EspritBundle\Entity\User;
use MyApp\EspritBundle\Form\CityForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MyApp\EspritBundle\Entity\Fidelite;
use MyApp\EspritBundle\Form\FideliteForm;

class FideliteController extends Controller
{
    public function minuteurAction()
{
    return $this->render('MyAppEspritBundle:SiteWeen/Fidelite:Minuteur.html.twig');
}

    public function goAction(Request $request)
    {
        $id = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $exist = $em->getRepository('MyAppEspritBundle:Fidelite')->existDQL($id);
        if($exist!=0)
        {
            $fideliteid = $em->getRepository('MyAppEspritBundle:Fidelite')->findDQL($id);
            $fidelite = $em->getRepository('MyAppEspritBundle:Fidelite')->findBy(array('fideliteid'=>$fideliteid));
            $fidelite2 = $em->getRepository('MyAppEspritBundle:Fidelite')->find($fideliteid);
            $fidelite2->setVu(1);
            $em->persist($fidelite2);
            $em->flush();
            return $this->render('@MyAppEsprit/SiteWeen/Fidelite/Go.html.twig',array('fidelites'=>$fidelite));
        }
        else{
            return $this->render('@MyAppEsprit/SiteWeen/Fidelite/Minuteur.html.twig');

        }

    }

    public function addFideliteAction(Request $request)
    {
        $fidelite=new Fidelite();
        $Form=$this->createForm(FideliteForm::class,$fidelite);
        $Form->handleRequest($request);
        if ($Form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $fidelite->setVu(0);

            $em->persist($fidelite);
            $em->flush();
            return $this->redirectToRoute("my_app_esprit_fidelite_display");
        }
        return $this->render("@MyAppEsprit/Fidelite/addFidelite.html.twig",array('formes'=>$Form->createView()));
    }

    public function displayFideliteAction()
    {
        $em=$this->getDoctrine()->getManager();
        $modele=$em->getRepository("MyAppEspritBundle:Fidelite")->findAll();
        return $this->render("@MyAppEsprit/Fidelite/displayFidelite.html.twig",array("formes"=>$modele));

    }



}