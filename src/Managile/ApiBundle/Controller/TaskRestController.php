<?php
/**
 * Created by PhpStorm.
 * User: Amaury
 * Date: 13/12/2015
 * Time: 17:41
 */

namespace Managile\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Util\Codes as Codes;
use FOS\RestBundle\Controller\FOSRestController as FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Managile\ApiBundle\Form\Type\POST\TaskFormType;
use Managile\ApiBundle\Entity\Task;
use Symfony\Component\HttpFoundation\Request;

class TaskRestController extends FOSRestController
{
    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $id
     * @return object
     */
    public function getTaskAction($id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Task');
        $task = $repository->find($id);
        if(!is_object($task)){
            throw $this->createNotFoundException();
        }
        return $task;
    }

    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $list_id
     * @return object
     */
    public function getTaskByListAction($list_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Task');

        $tasks = $repository->showTaskByList($list_id);

        if(!is_array($tasks)){
            throw $this->createNotFoundException();
        }
        return $tasks;
    }
	
	
	/**
     *
     * @View(serializerGroups={"Default","Details"})
     * @return object
     */
    public function getTaskTodayAction(){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Task');
        $todayTasks = $repository->showTaskToday();
        if(!is_array($todayTasks)){
            throw $this->createNotFoundException();
        }
        return $todayTasks;
    }
	
	/**
     *
     * @View(serializerGroups={"Default","Details"})
     * @return object
     */
    public function getTaskTomorrowAction(){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Task');
        $tasks = $repository->showTaskTomorrow();
        if(!is_array($tasks)){
            throw $this->createNotFoundException();
        }
        return $tasks;
    }
	
	/**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $task_id
     * @return object
     */
    public function deleteTaskAction($task_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Task');

        $retour = $repository->deleteTask($task_id);

        if(!($retour)){
            throw $this->createNotFoundException();
        }
        return $retour;
    }
	
	/**
     * @View(serializerGroups={"Default","Details"})
     * @param Request $request
     * @return View
     */
    public function postTaskAction(Request $request)
    {
        // that's the reason why we need to be able to create
        // an article without body or title, to use it as
        // a placeholder for the form
        $task = new Task();
        // createForm is provided by the parent class
        $form = $this->createForm(
            new TaskFormType(),
            $task
        );
        // this method is the one that will use the value in the POST
        // to update $article
        $form->handleRequest($request);
        // we use it like that instead of the standard $form->isValid()
        // because the json generated
        // is much readable than the one by serializing $form->getErrors()
        $errors = $this->get('validator')->validate($task);
        if (count($errors) > 0) {
            return new View(
                $errors,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($task);
        $manager->flush();
        // created => 201
        return $task;
    }

}