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
     * @param type $team_id
     *
     * @View(serializerGroups={"Default","Details"})
     * @return object
     */
    public function getBoardAction($team_id){
        $boards = $this->getDoctrine()->getRepository('ManagileApiBundle:Board')->findBoardByTeam($team_id);
        if(!is_object($boards)){
            throw $this->createNotFoundException();
        }
        return $boards;
    }
}