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
use Managile\ApiBundle\Entity\Member;
use FOS\RestBundle\Controller\FOSRestController as FOSRestController;
use Managile\ApiBundle\Form\Type\POST\MemberFormType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MemberRestController extends FOSRestController
{
    /**
     *
     * @param $user_id
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

    /**
     * @View(serializerGroups={"Default","Details"})
     * @param Request $request
     * @return View
     */
    public function postMemberAction(Request $request)
    {
        // that's the reason why we need to be able to create
        // an article without body or title, to use it as
        // a placeholder for the form
        $member = new Member();
        // createForm is provided by the parent class
        $form = $this->createForm(
            new MemberFormType(),
            $member
        );
        // this method is the one that will use the value in the POST
        // to update $article
        $form->handleRequest($request);
        // we use it like that instead of the standard $form->isValid()
        // because the json generated
        // is much readable than the one by serializing $form->getErrors()
        $errors = $this->get('validator')->validate($member);
        if (count($errors) > 0) {
            return new View(
                $errors,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($member);
        $manager->flush();
        // created => 201
        return $member;
    }
}