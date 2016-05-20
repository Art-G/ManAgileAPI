<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 11/05/2016
 * Time: 00:02
 */

namespace Managile\ApiBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController as FOSRestController;
use FOS\RestBundle\Controller\Annotations\View;

class TeamRoleRestController extends FOSRestController
{
    /**
     *
     * @View(serializerGroups={"Default","Details"})
     * @param $id
     * @return object
     */
    public function getTeamRoleAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('ManagileApiBundle:TeamRole');
        $teamRole = $repository->find($id);
        if (!is_object($teamRole)) {
            throw $this->createNotFoundException();
        }
        return $teamRole;
    }

    /**
     *
     * @View(serializerGroups={"Default","Details"})
     */
    public function getAllTeamRoleAction()
    {
        $teamRole = $this->getDoctrine()->getRepository('ManagileApiBundle:TeamRole')->findAll();
        return $teamRole;
    }

}
