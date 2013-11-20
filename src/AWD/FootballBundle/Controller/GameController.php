<?php

namespace AWD\FootballBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use AWD\FootballBundle\Entity\Game;
use AWD\FootballBundle\Form\GameType;

/**
 * Game controller.
 *
 */
class GameController extends Controller
{

    /**
     * Lists all Game entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AWDFootballBundle:Game')->findAll();

        return $this->render('AWDFootballBundle:Game:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Game entity.
     *
     */
    public function createAction(Request $request)
    {
        

        //$form = $this->createCreateForm($entity);
        //$form->handleRequest($request);
       $entity = new Game();
       $form = $this->createForm(new GameType());
       print $form->get('team_one_id')->getData();exit;
        if ($form->isValid()) {
            $entity->setTeamOneId($form->get('team_one_id')->getData());
            $entity->setTeamTwoId($form->get('team_two_id')->getData());
            $entity->getCreatedAt($form->get('created_at')->getData());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
        
            return $this->redirect($this->generateUrl('awd_game_show', array('id' => $entity->getId())));
         }

        return $this->render('AWDFootballBundle:Game:new.html.twig', array(
           'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Game entity.
    *
    * @param Game $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Game $entity)
    {
        $form = $this->createForm(new GameType(), $entity, array(
            'action' => $this->generateUrl('awd_game_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Game entity.
     *
     */
    public function newAction(Request $request)
    {
        //$entity = new Game();
        //$form   = $this->createCreateForm($entity);
         $em = $this->getDoctrine()->getManager();
         $allteams = $em->getRepository('AWDFootballBundle:Team')->AllTeams();
         $form = $this->createFormBuilder()
        ->add('team_one_id', 'choice', array('choices'=>$allteams))
        ->add('team_two_id', 'choice', array('choices'=>$allteams))
        ->add('team_one_score', 'text' , array('label' => 'Goal',
                                                                        'required' => false,
                                                                        'attr' => array(
                                                                        'class' => 'form-control input-goal'
                                                                        )))
        ->add('team_two_score', 'text' , array('label' => 'Goal',
                                                                        'required' => false,
                                                                        'attr' => array(
                                                                        'class' => 'form-control input-goal'
                                                                        )))
        ->add('created_at','datetime', array())
        ->getForm();
         $entity = new Game();
         //
        if ($request->isMethod('POST')) {
            $form->bind($request);
            $data = $form->getData();
            
       

            $entity->setTeamOneId($form->get('team_one_id')->getData());
            $entity->setTeamTwoId($form->get('team_two_id')->getData());
            $entity->getCreatedAt($form->get('created_at')->getData());
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $request->getSession()->getFlashBag()->add('success', 'You create game! Thanks!');
            return $this->redirect($this->generateUrl('awd_game_show', array('id' => $entity->getId())));

        }
        return $this->render('AWDFootballBundle:Game:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Game entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AWDFootballBundle:Game')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Game entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AWDFootballBundle:Game:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Game entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AWDFootballBundle:Game')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Game entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AWDFootballBundle:Game:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Game entity.
    *
    * @param Game $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Game $entity)
    {
        $form = $this->createForm(new GameType(), $entity, array(
            'action' => $this->generateUrl('awd_game_update', array('id' => $entity->getId())),
            'method' => 'PUT',
           'attr'=>array('class'=>'form-inline')  
        ));

        $form->add('submit', 'submit', array('label' => 'Update', 'attr'=>array('class'=>'btn btn-success') ));

        return $form;
    }
    /**
     * Edits an existing Game entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AWDFootballBundle:Game')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Game entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            if ($editForm->get('team_one_score')->getData() && $editForm->get('team_two_score')->getData()) {
                if ($editForm->get('team_one_score')->getData() == $editForm->get('team_two_score')->getData()) {
                     throw $this->createNotFoundException('We whant  winner!!!!.');
                }
                if ($editForm->get('team_one_score')->getData() < $editForm->get('team_two_score')->getData()) {
                    $entity->setWinnerId($editForm->get('team_two_id')->getData() );
                } else {
                    $entity->setWinnerId($editForm->get('team_one_id')->getData());
                }
            }
            $em->flush();

            return $this->redirect($this->generateUrl('awd_game_edit', array('id' => $id)));
        }

        return $this->render('AWDFootballBundle:Game:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Game entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AWDFootballBundle:Game')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Game entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('awd_game'));
    }

    /**
     * Creates a form to delete a Game entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('awd_game_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete',  'attr'=>array('class'=>'btn btn-danger pull-right') ))
            ->getForm()
        ;
    }
}
