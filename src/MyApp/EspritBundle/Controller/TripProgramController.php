<?php

namespace MyApp\EspritBundle\Controller;

use MyApp\EspritBundle\Entity\Country;
use MyApp\EspritBundle\Entity\Tripprogram;
use MyApp\EspritBundle\Entity\City;
use MyApp\EspritBundle\Entity\Flight;
use MyApp\EspritBundle\Form\TripProgramForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\DateTime;


class TripProgramController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function addTripProgramAction(Request $request)
    {



        $tripprogram = new Tripprogram();
        if ($request->isMethod('POST')) {
            $tripprogram->setDescription($request->get('description'));
            $tripprogram->setNbrpassenger($request->get('nbrPassenger'));
echo $var=$request->get('nbrPassenger');
            $em = $this->getDoctrine()->getManager();

            $city = $em->getRepository("MyAppEspritBundle:City")->findOneBy(array('name' => $request->get('city')));
            $flight = $em->getRepository("MyAppEspritBundle:Flight")->findOneBy(array('idflight' => $request->get('choix')));
            $hotel=$em->getRepository("MyAppEspritBundle:Hotel")->find(2);
            $price=$hotel->getPricebynight()*8+100;

            //$flight = $em->getRepository("MyAppEspritBundle:Flight")->find(4);
            $tripprogram->setIdcity($city);
            $tripprogram->setIdflight($flight);
            $tripprogram->setIdhotel($hotel);
            $tripprogram->setPrice($price);
            $tripprogram->setRating(0);
            $tripprogram->setNbrnight(8);
            $em->persist($tripprogram);
            $em->flush();
            return $this->redirectToRoute('my_app_esprit_displayTripProgram');
        }

        return $this->render('MyAppEspritBundle:Ween/TripProgram:addTripProgram.html.twig', array());




    }

    public function showaddTripProgramAction()
    {


        return $this->render('MyAppEspritBundle:Ween/TripProgram:addTripProgram.html.twig', array());


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

    public function findCitiesAction($id)
    {


        $em = $this->getDoctrine()->getManager();
        $country = $em->getRepository('MyAppEspritBundle:Country')->find($id);
        $city = $em->getRepository('MyAppEspritBundle:City')->findBy(array('idcountry' => $country->getIdcountry()));
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

    public function showFlightTableAction($city)
    {
        $em = $this->getDoctrine()->getManager();
        $response = new JsonResponse();
        $cityy = $em->getRepository('MyAppEspritBundle:City')->findBy(array('name' => $city));
        $flight= $em->getRepository('MyAppEspritBundle:Flight')->findBy(array('idarrivalcity' => $cityy[0]->getIdcity()));
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight1[$i]=$flight[$i]->getIdarrivalcity()->getName();
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight2[$i]=$flight[$i]->getIddeparturecity()->getName();
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight3[$i]=$flight[$i]->getArrivaldate()->format('Y - M - D');
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight4[$i]=$flight[$i]->getDeparturedate()->format('Y - M - D');
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight5[$i]=$flight[$i]->getArrivaltime()->format('H:i:S');
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight6[$i]=$flight[$i]->getDeparturetime()->format('H:i:S');
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight7[$i]=$flight[$i]->getPrice();
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight8[$i]=$flight[$i]->getIdairlinecompany()->getName();
        }
        for ($i = 0; $i < sizeof($flight); $i++) {
            $flight9[$i]=$flight[$i]->getIdflight();
        }
        return $response->setData(array('flight1' => $flight1,'flight2' => $flight2,'flight3' => $flight3,'flight4' => $flight4,'flight5' => $flight5
        ,'flight6' => $flight6,'flight7' => $flight7,'flight8' => $flight8,'flight9' => $flight9));

    }
    public function showHotelTableAction($city)
    {
        $em = $this->getDoctrine()->getManager();
        $response = new JsonResponse();
        $cityy = $em->getRepository('MyAppEspritBundle:City')->findBy(array('name' => $city));
        $adress=$em->getRepository('MyAppEspritBundle:Address')->findBy(array('idcity' => $cityy[0]->getIdcity()));
        $hotel=$em->getRepository('MyAppEspritBundle:Hotel')->findBy(array('idaddress' => $adress[0]));


        for ($i = 0; $i < sizeof($hotel); $i++) {
            $hotel1[$i]=$hotel[$i]->getName();
        }
        for ($i = 0; $i < sizeof($hotel); $i++) {
            $hotel2[$i]=$hotel[$i]->getStars();
        }
        for ($i = 0; $i < sizeof($hotel); $i++) {
            $hotel3[$i]=$hotel[$i]->getRating();
        }
        for ($i = 0; $i < sizeof($hotel); $i++) {
            $hotel4[$i]=$hotel[$i]->getPricebynight();
        }
        for ($i = 0; $i < sizeof($hotel); $i++) {
            $hotel5[$i]=$hotel[$i]->getIdhotel();
        }



        return $response->setData(array('hotel1' => $hotel1,'hotel2' => $hotel2,'hotel3' => $hotel3,'hotel4' => $hotel4,'hotel5' => $hotel5));

    }
    public function displayTripProgramAction()
    {
        $em = $this->getDoctrine()->getManager();
        $trip = $em->getRepository("MyAppEspritBundle:Tripprogram")->findAll();
        return $this->render("MyAppEspritBundle:Ween/TripProgram:displayTripProgram.html.twig", array('trip' => $trip));
    }

    public function deleteTripProgramAction($id)
    {
        $em=$this->getDoctrine()->getManager();
        $trip=$em->getRepository('MyAppEspritBundle:Tripprogram')->find($id);
        $em->remove($trip);
        $em->flush();
        return $this->redirectToRoute('my_app_esprit_displayTripProgram');
    }

    public function updateTripProgramAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $trip = $em->getRepository("MyAppEspritBundle:Tripprogram")->find($id);

        return $this->render('MyAppEspritBundle:Ween/TripProgram:updateTripprogram.html.twig', array("trip" => $trip));
    }
    public function userTripInterfaceAction()
    {

        $em = $this->getDoctrine()->getManager();
        $trip = $em->getRepository("MyAppEspritBundle:Tripprogram")->findAll();
        $imgs=array();
        foreach ($trip as $key => $entity)
        {
            $imgs[$key] = base64_encode(stream_get_contents($entity->getIdcity()->getPicture()));
        }

        return $this->render('MyAppEspritBundle:Ween/TripProgram:userTripProgram.html.twig', array('trip' => $trip,"images"=>$imgs));
    }
    public function testAction()
    {
        $em = $this->getDoctrine()->getManager();
        $trip = $em->getRepository("MyAppEspritBundle:Tripprogram")->findAll();
        return $this->render('MyAppEspritBundle:Ween/TripProgram:userTripProgram.html.twig', array('trip' => $trip));
    }
    public function tripprogramAction()
    {

        $em = $this->getDoctrine()->getManager();
        $trip=$em->getRepository('MyAppEspritBundle:Tripprogram')->findAll();
        $imgs=array();
        foreach ($trip as $key => $entity)
        {
            $imgs[$key] = base64_encode(stream_get_contents($entity->getIdcity()->getPicture()));
        }

        return $this->render('MyAppEspritBundle:Ween/TripProgram:tripprogram.html.twig', array('trip' => $trip,"images"=>$imgs));
    }
    public function updateTripProgram2Action(Request $request,$id)
    {
        $em = $this->getDoctrine()->getManager();
        $tripprogram = $em->getRepository("MyAppEspritBundle:Tripprogram")->find($id);
        if ($request->isMethod('POST')) {
            $tripprogram->setDescription($request->get('description'));
            $tripprogram->setNbrpassenger($request->get('nbrPassenger'));

            $em = $this->getDoctrine()->getManager();

            $city = $em->getRepository("MyAppEspritBundle:City")->findOneBy(array('name' => $request->get('cityu')));
            $flight = $em->getRepository("MyAppEspritBundle:Flight")->findOneBy(array('idflight' => $request->get('choix')));

            //$flight = $em->getRepository("MyAppEspritBundle:Flight")->find(4);
            $tripprogram->setIdcity($city);
            $tripprogram->setIdflight($flight);
            $tripprogram->setPrice($request->get('price'));
            $tripprogram->setRating(0);
            $em->persist($tripprogram);
            $em->flush();




        }
        return $this->redirectToRoute('my_app_esprit_displayTripProgram');
    }
  /*  public function findPriceAction()
    {
        $em=$this->getDoctrine()->getManager();
        $trip=$em->getRepository('MyAppEspritBundle:Tripprogram')->findPrice();
        return $this->render("MyAppEspritBundle:Ween/TripProgram:displayTripProgram.html.twig", array('trip' => $trip));

    }*/
    public function searchtripAction(Request $request)
    {


        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();

            $cityname = $request->get('name');
            echo $cityname ;
            $cityy = $em->getRepository('MyAppEspritBundle:City')->findBy(array('name' => $cityname));
            //echo $cityy->getName() ;
            $trip = $em->getRepository('MyAppEspritBundle:Tripprogram')->findBy(array('idcity' => $cityy[0]->getIdcity()));


        }

        $imgs=array();
        foreach ($trip as $key => $entity)
        {
            $imgs[$key] = base64_encode(stream_get_contents($entity->getIdcity()->getPicture()));
        }

        return $this->render('MyAppEspritBundle:Ween/TripProgram:tripprogram.html.twig', array('trip' => $trip,"images"=>$imgs));
    }
    public function searchtrippriceAction(Request $request)
    {


        if ($request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();

            $userid=$this->getUser()->getId();
            $budget = $request->get('name2');
            echo $userid ;
            echo $budget;
          //  $cityy = $em->getRepository('MyAppEspritBundle:City')->findBy(array('name' => $cityname));
            //echo $cityy->getName() ;
            $trip = $em->getRepository('MyAppEspritBundle:Tripprogram')->findByPrice($userid,$budget);


        }

        $imgs=array();
        foreach ($trip as $key => $entity)
        {
            $imgs[$key] = base64_encode(stream_get_contents($entity->getIdcity()->getPicture()));
        }

        return $this->render('MyAppEspritBundle:Ween/TripProgram:testtemplateuser.html.twig', array('trip' => $trip,"images"=>$imgs));
    }
    public function testuserAction()
    {

        $em = $this->getDoctrine()->getManager();
        $trip=$em->getRepository('MyAppEspritBundle:Tripprogram')->findAll();
        $imgs=array();
        foreach ($trip as $key => $entity)
        {
            $imgs[$key] = base64_encode(stream_get_contents($entity->getIdcity()->getPicture()));
        }

        return $this->render('MyAppEspritBundle:Ween/TripProgram:testtemplateuser.html.twig', array('trip' => $trip,"images"=>$imgs));
    }
    public function testvideoAction()
    {

        $ffmpeg = $this->get('dubture_ffmpeg.ffmpeg');

// Open video
        $video = $ffmpeg->open('C:\Utilisateurs\Ines\Bureau\rome.avi');

// Resize to 1280x720
        $video
            ->filters()
            ->resize(new Dimension(1280, 720), ResizeFilter::RESIZEMODE_INSET)
            ->synchronize();

// Start transcoding and save video
        $video->save(new X264(), 'C:\Utilisateurs\Ines\Bureau\rome.mp4');
       return $this->render('MyAppEspritBundle:Ween/TripProgram:testvideo.html.twig', array());


    }


}
