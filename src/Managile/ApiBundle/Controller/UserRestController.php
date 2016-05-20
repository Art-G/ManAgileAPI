<?php

namespace Managile\ApiBundle\Controller;

use FOS\RestBundle\Controller\Annotations\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class UserRestController extends Controller
{

    /**
    *
    * @param type $username
    *
    * @View(serializerGroups={"Default","Details"})
    */
    public function getUserAction($username){
        $user = $this->getDoctrine()->getRepository('ManagileApiBundle:FosUser')->findOneByUsername($username);
        if(!is_object($user)){
            throw $this->createNotFoundException();
        }
        return $user;
    }

    /**
     *
     * @View(serializerGroups={"Default","Details"})
     */
    public function getAllUserAction(){
        $user = $this->getDoctrine()->getRepository('ManagileApiBundle:FosUser')->findAll();
        return $user;
    }

    /**
    *
    * @View(serializerGroups={"Me"})
    */
    public function getMeAction(){
        $this->forwardIfNotAuthenticated();
        return $this->getUser();
    }

    /**
    * Shortcut to throw a AccessDeniedException($message) if the user is not authenticated
    * @param String $message The message to display (default:'warn.user.notAuthenticated')
    */
    protected function forwardIfNotAuthenticated($message='warn.user.notAuthenticated'){
        if (!is_object($this->getUser()))
        {
            throw new AccessDeniedException($message);
        }
    }
}