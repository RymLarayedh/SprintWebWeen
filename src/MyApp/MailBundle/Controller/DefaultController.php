<?php

namespace MyApp\MailBundle\Controller;
use MyApp\MailBundle\Entity\Mail;
use MyApp\MailBundle\Form\MailTypeForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Swift_Message;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $mail = new Mail();

        $form= $this->createForm(MailTypeForm::class, $mail);

        $form->handleRequest($request) ;

        if ($form->isValid()) {

            $message = Swift_Message::newInstance()

                ->setSubject('Accusé de réception')

                ->setFrom('hichri.hichrisirine@gmail.com')

                ->setTo($mail->getEmail())

                ->setBody(

                    $this->renderView(

                        'MyAppMailBundle::mail.html.twig',

                        array('nom' => $mail->getNom(), 'prenom'=>$mail->getPrenom())

                    ),

                    'text/html'

                );

            $this->get('mailer')->send($message);

            return $this->redirect($this->generateUrl('my_app_mail_accusm'));
        }

        return $this->render('MyAppMailBundle::new.html.twig', array('form'=>$form

            ->createView()));

    }
    public function succesAction(){

        return new Response("email envoyé avec succès, Merci de vérifier votre adresse mail

.");

    }

}
