<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 25/11/2015
 * Time: 15:01
 */

namespace Managile\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class TeamRestController extends Controller
{
    /**
     *
     * @param type $team_id
     *
     * @View(serializerGroups={"Default","Details"})
     * @return object
     */
    public function getTeamAction($team_id){
        $team = $this->getDoctrine()->getRepository('ManagileApiBundle:Team')->find($team_id);
        if(!is_object($team)){
            throw $this->createNotFoundException();
        }
        return $team;
    }

    /**
     *
     * @param type $user_id
     *
     * @View(serializerGroups={"Default","Details"})
     * @return object
     */
    public function getTeamByUserAction($user_id){
        $member = $this->getDoctrine()->getRepository('ManagileApiBundle:Member')->findOneBy(array("user" => $user_id));
        $team = $member->getTeam();
        if(!is_object($team)){
            throw $this->createNotFoundException();
        }
        return $team;
    }
}