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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Managile\ApiBundle\Form\Type\POST\BoardFormType;
use Managile\ApiBundle\Entity\Board;
use Symfony\Component\HttpKernel\Exception\HttpException;
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
     * @View(serializerGroups={"Default","Details"})
     * @param Request $request
     * @return View
     */
    public function postBoardAction(Request $request)
    {
        // that's the reason why we need to be able to create
        // an article without body or title, to use it as
        // a placeholder for the form
        $board = new Board();
        // createForm is provided by the parent class
        $form = $this->createForm(
            new BoardFormType(),
            $board
        );
        // this method is the one that will use the value in the POST
        // to update $article
        $form->handleRequest($request);
        // we use it like that instead of the standard $form->isValid()
        // because the json generated
        // is much readable than the one by serializing $form->getErrors()
        $errors = $this->get('validator')->validate($board);
        if (count($errors) > 0) {
            return new View(
                $errors,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($board);
        $manager->flush();
        // created => 201
        return $board;
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