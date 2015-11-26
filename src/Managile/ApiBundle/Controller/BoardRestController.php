<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 25/11/2015
 * Time: 15:48
 */

namespace Managile\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class BoardRestController extends Controller
{
    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $id
     * @return object
     */
    public function getBoardAction($id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Board');
        $boards = $repository->find($id);
        if(!is_object($boards)){
            throw $this->createNotFoundException();
        }
        return $boards;
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