<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 25/11/2015
 * Time: 15:48
 */

namespace Managile\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Util\Codes as Codes;
use FOS\RestBundle\Controller\FOSRestController as FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Managile\ApiBundle\Form\Type\POST\BoardFormType;
use Managile\ApiBundle\Entity\Board;
use Symfony\Component\HttpFoundation\Request;

class BoardRestController extends FOSRestController
{
    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $id
     * @return object
     */
    public function getBoardAction($id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Board');
        $board = $repository->find($id);
        if(!is_object($board)){
            throw $this->createNotFoundException();
        }
        return $board;
    }

    /**
     *
     * @param Request $request
     * @return \FOS\RestBundle\View\View
     * @Method({"GET", "POST"})
     */
    public function postBoardAction(Request $request) {
        $board = new Board();

        $form = $this->createForm(new BoardFormType(), $board);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $board->setOwner($this->getUser());

            $manager = $this->getDoctrine()->getManager();

            $manager->persist($board);
            $manager->flush();

            return $this->_view(
                array('board' => $board),
                Codes::HTTP_CREATED,
                array(),
                array('BoardDefault')
            );
        }

        return $this->view($form->getErrors(true, false), Codes::HTTP_BAD_REQUEST);
    }

    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $team_id
     * @return object
     */
    public function getBoardByTeamAction($team_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Board');

        $boards = $repository->showBoardByTeam($team_id);

        if(!is_array($boards)){
            throw $this->createNotFoundException();
        }
        return $boards;
    }
}