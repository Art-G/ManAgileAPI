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
use Managile\ApiBundle\Form\Type\POST\BoardFormType;
use Managile\ApiBundle\Entity\Board;
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

}