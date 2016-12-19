<?php
/**
 * Created by PhpStorm.
 * User: rymlarayedh
 * Date: 21/11/2016
 * Time: 10:06
 */

namespace MyApp\EspritBundle\Controller;

use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UtilisateurController extends Controller
{
    public function dislayWeenersAction(){

        $em=$this->getDoctrine()->getManager();
        $weeners=$em->getRepository("MyAppEspritBundle:User")->displayWeenersDQL();
        return ($this->render("@MyAppEsprit/User/displayWeener.html.twig",array("weeners"=>$weeners)));
    }

    public function weenDisplayMyFriendsAction(){

        $em=$this->getDoctrine()->getManager();
        $userid = $this->getUser()->getId();
        $friends=$em->getRepository("MyAppEspritBundle:Friends")->findMyFriendsDQL($userid);
        return ($this->render("@MyAppEsprit/SiteWeen/displayMyFriends.html.twig",array("friends"=>$friends)));
    }

    public function weenDisplayAllWeenersAction(){

        $em=$this->getDoctrine()->getManager();
        $weeners=$em->getRepository("MyAppEspritBundle:User")->displayWeenersDQL();
        return ($this->render("@MyAppEsprit/SiteWeen/weenDisplayAllWeeners.html.twig",array("weeners"=>$weeners)));
    }

    /*public function profileAction(){

        $em=$this->getDoctrine()->getManager();
        $weeners=$em->getRepository("MyAppEspritBundle:User")->findBy(array('id'=>11));
        return ($this->render("@MyAppEsprit/SiteWeen/profile.html.twig",array("weeners"=>$weeners)));
    }*/

    public function profileUserAction($friendid){

        $em=$this->getDoctrine()->getManager();
        $friend=$em->getRepository("MyAppEspritBundle:User")->findBy(array('username'=>$friendid));
        return ($this->render("@MyAppEsprit/SiteWeen/profileUser.html.twig",array("friend"=>$friend)));
    }




}