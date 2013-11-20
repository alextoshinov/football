<?php

namespace AWD\FootballBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
       $securityContext = $this->container->get('security.context');
       
        if( !$securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED') ){
            return $this->redirect($this->generateUrl('fos_user_security_login'));
        }
        //
       $em = $this->getDoctrine()->getManager();
       $allgames = $em->getRepository('AWDFootballBundle:Game')->AllGames();
       $allwinners = $em->getRepository('AWDFootballBundle:Game')->AllWinners();
       //Count teams
       $countTeams = $em->getRepository('AWDFootballBundle:Team')->getCountTeams();
       $countTeams = ceil( $countTeams / 2) ;

       
       //
        $teams = $em->getRepository('AWDFootballBundle:Team')->getWithPlayers();
       //
       foreach($teams as $team)
        {
          $team->setActivePlayers($em->getRepository('AWDFootballBundle:Player')->getActivePlayers($team->getId()));
        }
        //
        return $this->render('AWDFootballBundle:Default:index.html.twig', array(
          'teams' => $teams, 
          'countTeams' => $countTeams,
          'allgames' => $allgames,
          'allwinners'=>$allwinners
        ));
    }
    //
    public function searchAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $query = $this->getRequest()->get('query');
 
        if(!$query) {
            return $this->redirect($this->generateUrl('awd_player'));
        }
 
        $players = $em->getRepository('AWDFootballBundle:Player')->getForLuceneQuery($query);
 
        return $this->render('AWDFootballBundle:Player:search.html.twig', array('players' => $players));
    }
    //
}
