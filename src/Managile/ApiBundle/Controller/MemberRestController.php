<?php
/**
 * Created by PhpStorm.
 * User: Arthur
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
}