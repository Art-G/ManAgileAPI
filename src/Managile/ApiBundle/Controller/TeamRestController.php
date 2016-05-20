<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 25/11/2015
 * Time: 15:01
 */

namespace Managile\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Util\Codes as Codes;
use FOS\RestBundle\Controller\FOSRestController as FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Managile\ApiBundle\Form\Type\POST\TeamFormType;
use Managile\ApiBundle\Entity\Team;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpFoundation\Request;

class TeamRestController extends FOSRestController
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
    public function getOneTeamByUserAction($user_id){
        $member = $this->getDoctrine()->getRepository('ManagileApiBundle:Member')->findOneBy(array("user" => $user_id));
        $team = $member->getTeam();
        if(!is_object($team)){
            throw $this->createNotFoundException();
        }
        return $team;
    }

    /**
     *
     * @param $user_id
     *
     * @View(serializerGroups={"Default","Details"})
     * @return object
     */
    public function getTeamByUserAction($user_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Member');

        $members = $repository->showMemberByUser($user_id);

        return $members;
    }

    /**
     * @View(serializerGroups={"Default","Details"})
     * @param Request $request
     * @return View
     */
    public function postTeamAction(Request $request)
    {
        // that's the reason why we need to be able to create
        // an article without body or title, to use it as
        // a placeholder for the form
        $team = new Team();
        // createForm is provided by the parent class
        $form = $this->createForm(
            new TeamFormType(),
            $team
        );
        // this method is the one that will use the value in the POST
        // to update $article
        $form->handleRequest($request);
        // we use it like that instead of the standard $form->isValid()
        // because the json generated
        // is much readable than the one by serializing $form->getErrors()
        $errors = $this->get('validator')->validate($team);
        if (count($errors) > 0) {
            return new View(
                $errors,
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($team);
        $manager->flush();
        // created => 201
        return $team;
    }

    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $team_id
     * @return object
     */
    public function deleteTeamAction($team_id){
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:Team');

        $retour = $repository->deleteTeam($team_id);

        if(!($retour)){
            throw $this->createNotFoundException();
        }
        return $retour;
    }
}