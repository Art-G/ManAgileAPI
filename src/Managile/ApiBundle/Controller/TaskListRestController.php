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
use Managile\ApiBundle\Form\Type\POST\TaskListFormType;
use Managile\ApiBundle\Entity\TaskList;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;

class TaskListRestController extends FOSRestController
{
    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $id
     * @return object
     */
    public function getTaskListAction($id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:TaskList');
        $lists = $repository->find($id);
        if(!is_object($lists)){
            throw $this->createNotFoundException();
        }
        return $lists;
    }

    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $board_id
     * @return object
     */
    public function getTaskListByBoardAction($board_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:TaskList');

        $lists = $repository->showTaskListByBoard($board_id);

        if(!is_array($lists)){
            throw $this->createNotFoundException();
        }
        return $lists;
    }

    /**
     * @View(serializerGroups={"Default","Details"})
     * @param Request $request
     * @return View
     */
    public function postTaskListAction(Request $request)
    {
        // that's the reason why we need to be able to create
        // an article without body or title, to use it as
        // a placeholder for the form
        $list = new TaskList();
        // createForm is provided by the parent class
        $form = $this->createForm(
            new TaskListFormType(),
            $list
        );
        // this method is the one that will use the value in the POST
        // to update $article
        $form->handleRequest($request);
        // we use it like that instead of the standard $form->isValid()
        // because the json generated
        // is much readable than the one by serializing $form->getErrors()
        $errors = $this->get('validator')->validate($list);
        if (count($errors) > 0) {
            return new View(
                $errors,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($list);
        $manager->flush();
        // created => 201
        return $list;
    }
	
	/**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $list_id
     * @return object
     */
    public function deleteListAction($list_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:TaskList');

        $retour = $repository->deleteList($list_id);

        if(!($retour)){
            throw $this->createNotFoundException();
        }
        return $retour;
    }

}