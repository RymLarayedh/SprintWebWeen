<?php
/**
 * Created by PhpStorm.
 * User: rymlarayedh
 * Date: 13/11/2016
 * Time: 10:16
 */

namespace MyApp\EspritBundle\Controller;
use MyApp\EspritBundle\Entity\User;
use MyApp\EspritBundle\Entity\Friends;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FriendsController extends Controller
{
    public function indexAction($name)
    {

        return $this->render('', array('name' => $name));

    }

    public function findMyFriendsAction(){


        $em=$this->getDoctrine()->getManager();
        $userid = $this->getUser()->getId();
        $friends=$em->getRepository("MyAppEspritBundle:Friends")->findMyFriendsDQL($userid);
        return ($this->render("MyAppEspritBundle:Friends:findMyFriends.html.twig",array("friends"=>$friends)));
    }



    public function findInvitationsAction(){

        $em=$this->getDoctrine()->getManager();
        $userid = $this->getUser()->getId();
        $nbr=$em->getRepository("MyAppEspritBundle:Friends")->countInvitationsDQL($userid);
        $friends=$em->getRepository("MyAppEspritBundle:Friends")->findInvitationsDQL($userid);
        return ($this->render("MyAppEspritBundle:Friends:findInvitations.html.twig",array("friends"=>$friends,"nbr"=>$nbr)));
    }

    public function findAllInvitationsAction(){

        $em=$this->getDoctrine()->getManager();
        $userid = $this->getUser()->getId();
        $nbr=$em->getRepository("MyAppEspritBundle:Friends")->countInvitationsDQL($userid);
        $friends=$em->getRepository("MyAppEspritBundle:Friends")->findInvitationsDQL($userid);
        return ($this->render("MyAppEspritBundle:Friends:AllInvitations.html.twig",array("friends"=>$friends,"nbr"=>$nbr)));

    }
    public function weenfindAllInvitationsAction(){

        $em=$this->getDoctrine()->getManager();
        $userid = $this->getUser()->getId();

        $nbr=$em->getRepository("MyAppEspritBundle:Friends")->countInvitationsDQL($userid);
        $friends=$em->getRepository("MyAppEspritBundle:Friends")->findInvitationsDQL($userid);
        return ($this->render("@MyAppEsprit/SiteWeen/weenDisplayAllInvitations.html.twig",array("friends"=>$friends,"nbr"=>$nbr)));

    }



    public function findUserFriendsAction(Request $request)
    {
        $userid=$request->get('userid');
        $em = $this->getDoctrine()->getManager();
        $friend = $em->getRepository('MyAppEspritBundle:Friends')->findBy(array('userid' => $userid));
        return $this->render("MyAppEspritBundle:Friends:findUserFriends.html.twig",array('friends'=>$friend));
    }
    public function acceptFriendAction($t){
        //Add First Line
        $em=$this->getDoctrine()->getManager();
        $friend=$em->getRepository('MyAppEspritBundle:Friends')->find($t);
        $friend->setStatus(1);
        $em->persist($friend);
        $em->flush();

        //Add Scend Line
        /* $em2=$this->getDoctrine()->getManager();
         $friend2= new Friends();
         $friendid=$em2->getRepository('MyAppEspritBundle:Friends')->findAcceptedFriendFDQL($t);
         $userid=$em2->getRepository('MyAppEspritBundle:Friends')->findAcceptedFriendUDQL($t);

         $user1 = $em2->getRepository('MyAppEspritBundle:User')->findBy(array('friendid' => $friendid));
         $user2 = $em2->getRepository('MyAppEspritBundle:User')->findBy(array('userid' => $userid));
         $friend2->setStatus(1);
         $friend2->setFriendid($user2);
         $friend2->setUserid($user1);
         $em2->persist($friend2);
         $em2->flush();*/

        return $this->redirectToRoute("ween_friend_allinvitation");

    }



    public function refuseInvitationAction($idfu)
    {
        $em=$this->getDoctrine()->getManager();
        $friend=$em->getRepository('MyAppEspritBundle:Friends')->find($idfu);
        $em->remove($friend);
        $em->flush();
        return $this->redirectToRoute("ween_friend_allinvitation");
    }

    public function weenacceptFriendAction($t){
        //Add First Line
        $em=$this->getDoctrine()->getManager();
        $friend=$em->getRepository('MyAppEspritBundle:Friends')->find($t);
        $friend->setStatus(1);
        $em->persist($friend);
        $em->flush();

        //Add Scend Line
        $em2=$this->getDoctrine()->getManager();
        $friend2= new Friends();
        $friendid=$em2->getRepository('MyAppEspritBundle:Friends')->findAcceptedFriendFDQL($t);
        $userid=$em2->getRepository('MyAppEspritBundle:Friends')->findAcceptedFriendUDQL($t);
        $user1 = $em2->getRepository('MyAppEspritBundle:User')->find($friendid);
        $user2 = $em2->getRepository('MyAppEspritBundle:User')->find($userid);
        $friend2->setStatus(1);
        $friend2->setFriendid($user2);
        $friend2->setUserid($user1);
        $em2->persist($friend2);
        $em2->flush();

        return $this->redirectToRoute("ween_friend_ween_allinvitation");

    }



    public function weenrefuseInvitationAction($idfu)
    {
        $em=$this->getDoctrine()->getManager();
        $friend=$em->getRepository('MyAppEspritBundle:Friends')->find($idfu);
        $em->remove($friend);
        $em->flush();
        return $this->redirectToRoute("ween_friend_ween_allinvitation");
    }
    public function deleteInvitationAction($id)
    {
        // Delete first Line
        $em=$this->getDoctrine()->getManager();
        $userid = $this->getUser()->getId();
        $em->getRepository('MyAppEspritBundle:Friends')->deleteDQL($userid,$id);
        $em->getRepository('MyAppEspritBundle:Friends')->deleteDQL($id,$userid);

       /* $idfu1=$em->getRepository('MyAppEspritBundle:Friends')->findFUDQL($friendid,$userid);
        $friend=$em->getRepository('MyAppEspritBundle:Friends')->find($idfu1);
        $em->remove($friend);
        $em->flush();


        $idfu2=$em->getRepository('MyAppEspritBundle:Friends')->findFUDQL($userid,$friendid);
        $friend2=$em->getRepository('MyAppEspritBundle:Friends')->find($idfu2);
        $em->remove($friend2);
        $em->flush();

        //Delete Second Line
        /* $friend2= new Friends();
         $friendid=$em->getRepository('MyAppEspritBundle:Friends')->findAcceptedFriendFDQL($idfu);
         $userid=$em->getRepository('MyAppEspritBundle:Friends')->findAcceptedFriendUDQL($idfu);
         $user1 = $em->getRepository('MyAppEspritBundle:Friends')->find($friendid);
         $user2 = $em->getRepository('MyAppEspritBundle:Friends')->findBy($userid);
         $friend2->setStatus(1);
         $friend2->setFriendid($user2);
         $friend2->setUserid($user1);
         $em->remove($friend2);
         $em->flush();*/

        return $this->redirectToRoute("ween_display_myfriends");
    }



    public function addInvitationAction($id){

        $em=$this->getDoctrine()->getManager();
        $friend=new Friends();
        $friendid=$em->getRepository('MyAppEspritBundle:User')->find($id);
        //$userid=$this->getUser();
        //$userid=$em->getRepository('MyAppEspritBundle:User')->find(2);
       // $userid=$this->get('security.token_storage')->getToken()->getUser();
        $userid = $this->getUser();

        $friend->setUserid($userid);
        $friend->setFriendid($friendid);
        $friend->setStatus(0);
        $em=$this->getDoctrine()->getManager();

        $exist=$em->getRepository('MyAppEspritBundle:Friends')->existDQL($userid,$friendid);
       if($exist==0)
        {
            $em->persist($friend);
            $em->flush();
        }


        return $this->redirectToRoute('ween_display_AllWeeners');

    }
}