<?php

namespace MyApp\WeenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('', array('name' => $name));
    }

    public function BlockAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MyAppWeenBundle:User')->find($id);
        $user->setEnabled(0);
        $em->persist($user);
        $em->flush();

        return new Response("Hi Block");
    }

    public function UnBlockAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('MyAppWeenBundle:User')->find($id);
        $user->setEnabled(1);
        $em->persist($user);
        $em->flush();

        return new Response("Hi UnBlock");
    }

    public function ShowAllWeenersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('MyAppWeenBundle:User')->findAll();

        return $this->render('MyAppWeenBundle:Admin:ShowAllWeeners.html.twig',array('users'=>$users));
    }
}
