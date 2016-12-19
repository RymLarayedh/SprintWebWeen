<?php
/**
 * Created by PhpStorm.
 * User: rymlarayedh
 * Date: 18/11/2016
 * Time: 21:30
 */

namespace MyApp\EspritBundle\Controller;
//use Html2Pdf_Html2Pdf;
use Symfony\Component\HttpFoundation\Response;
use MyApp\EspritBundle\Entity\Tripprogram;
use MyApp\EspritBundle\Form\ReportForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use MyApp\EspritBundle\Entity\Report;
use MyApp\EspritBundle\Form\ReportUserForm;

class ReportController extends Controller
{
    public function display_report_tableAction()
    {
        $em=$this->getDoctrine()->getManager();
        $report=$em->getRepository("MyAppEspritBundle:Report")->findAll();
        return $this->render("MyAppEspritBundle:Report:displayReport.html.twig",array("reports"=>$report));
    }

    public function deleteReportAction($reportid)
    {
        $em=$this->getDoctrine()->getManager();
        $report=$em->getRepository('MyAppEspritBundle:Report')->find($reportid);
        $em->remove($report);
        $em->flush();

        return $this->redirectToRoute("dispaly_report_table");
    }

    public function updateReportAction($reportid,Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $report = $em->getRepository('MyAppEspritBundle:Report')->find($reportid);

        $Form = $this->createForm(ReportForm::class, $report);
        $Form->handleRequest($request);
        if ($Form->isValid()){
            $em=$this->getDoctrine()->getManager();
            $em->persist($report);
            $em->flush();
            return $this->redirectToRoute("dispaly_report_table");
        }
        return $this->render("MyAppEspritBundle:Report:updateReport.html.twig",array('formes'=>$Form->createView()));
    }
    public function findReportAction(Request $request)
    {
        $reportid=$request->get('reportid');
        $em = $this->getDoctrine()->getManager();
        $report = $em->getRepository('MyAppEspritBundle:Report')->findBy(array('reportid' => $reportid));
        return $this->render("MyAppEspritBundle:Report:findReport.html.twig",array('reports'=>$report));
    }

    /*public function addReportUserAction($id){

        /*$report=new Report();
        $Form=$this->createForm(ReportUserForm::class,$report);
        $Form->handleRequest($request);
        if ($Form->isValid()){
            $reportid=$request->get('reportid');
            $em = $this->getDoctrine()->getManager();
            $report2 = $em->getRepository('MyAppEspritBundle:Report')->findBy(array('reportid' => $reportid));


                $user = $em->getRepository('MyAppEspritBundle:Utilisateur')->find(1);
                $report->setReporteduid($user);
                $em->persist($report);
                $em->flush();
                return $this->redirectToRoute("dispaly_report_table");

        }
        return $this->render("MyAppEspritBundle:Report:addReportUser.html.twig",array('formes'=>$Form->createView()));
    }*/


    public function addReportUserAction($id){
        $report = new Report();
        $em = $this->getDoctrine()->getManager();

        $user= $this->getUser();
        $report->setUserid($user);

        $reporteduser=$em->getRepository('MyAppEspritBundle:User')->find($id);
        $report->setReporteduid($reporteduser);

        $reportedtrip=$em->getRepository('MyAppEspritBundle:Tripprogram')->find(999);
        $report->setReportedtid($reportedtrip);

        $em->persist($report);
        $em->flush();
        return $this->redirectToRoute("ween_display_myfriends");

    }

    public function reportpdfAction()
    {
        //$id = $this->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();

        $entitys = $em->getRepository('MyAppEspritBundle:Report')->findAll();

        //$token = new \Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken($this->getUser()->getUsername(), null, "secured_area", array($dynamic_rolename));
        // $imd=token->getUser()->getId();
        //on stocke la vue à convertir en PDF, en n'oubliant pas les paramètres twig si la vue comporte des données dynamiques
        $html = $this->renderView('MyAppEspritBundle:Report:reportpdf.html.twig', array('entitys' => $entitys));

        //on instancie la classe Html2Pdf_Html2Pdf en lui passant en paramètre
        //le sens de la page "portrait" => p ou "paysage" => l
        //le format A4,A5...
        //la langue du document fr,en,it...
        $html2pdf = new \Html2Pdf_Html2Pdf('P','A4','fr');

        //SetDisplayMode définit la manière dont le document PDF va être affiché par l’utilisateur
        //fullpage : affiche la page entière sur l'écran
        //fullwidth : utilise la largeur maximum de la fenêtre
        //real : utilise la taille réelle
        $html2pdf->pdf->SetDisplayMode('fullwidth');

        //writeHTML va tout simplement prendre la vue stocker dans la variable $html pour la convertir en format PDF
        $html2pdf->writeHTML($html);

        //Output envoit le document PDF au navigateur internet avec un nom spécifique qui aura un rapport avec le contenu à convertir (exemple : Facture, Règlement…)
        $html2pdf->Output('Agence.pdf');
        var_dump($html); die();

        return new Response();
    }

}