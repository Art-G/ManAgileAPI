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