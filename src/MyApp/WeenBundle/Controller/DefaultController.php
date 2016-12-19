<?php

namespace MyApp\WeenBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $u = $this->getUser();
        if($u->hasRole("ROLE_CLIENT"))
        {
            return new Response("hi Client ");
        }

        if($u->hasRole("ROLE_AGENT"))
        {
            return new Response("hi Agent ");
        }

        if($u->hasRole("ROLE_ADMIN"))
        {
            $userManager = $this->get('fos_user.user_manager');
            $u->addRole("ROLE_AGENT");
            $u->removeRole("ROLE_ADMIN");
            $userManager->updateUser($u);
            return new Response("hi root");
        }
        else{

            return $this->redirectToRoute('my_app_esprit_homepage');
        }
        //return $this->render('MyAppWeenBundle:Default:index.html.twig',array('u'=>$u));
    }
}
