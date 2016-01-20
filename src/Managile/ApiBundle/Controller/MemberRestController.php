<?php
/**
 * Created by PhpStorm.
 * User: Amaury
 * Date: 25/11/2015
 * Time: 15:22
 */

namespace Managile\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class MemberRestController extends Controller
{
    /**
     *
     * @param type $user_id
     *
     * @View(serializerGroups={"Default","Details"})
     * @return object
     */
    public function getMemberAction($user_id){
        $member = $this->getDoctrine()->getRepository('ManagileApiBundle:Member')->findOneBy(array("user" => $user_id));
        if(!is_object($member)){
            throw $this->createNotFoundException();
        }
        return $member;
    }
	
	
	/**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $team_id
     * @return object
     */
    public function getMemberByTeamAction($team_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Member');

        $members = $repository->showMemberByTeam($team_id);

        if(!is_array($members)){
            throw $this->createNotFoundException();
        }
        return $members;
    }
}