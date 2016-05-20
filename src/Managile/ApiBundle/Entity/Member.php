<?php

namespace Managile\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Member
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Managile\ApiBundle\Entity\MemberRepository")
 */
class Member
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $archived = '0';

    /**
     * @var Team
     */
    private $team;

    /**
     * @var TeamRole
     */
    private $role;

    /**
     * @var FosUser
     */
    private $user;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return Member
     */
    public function setArchived($archived)
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Get archived
     *
     * @return boolean
     */
    public function getArchived()
    {
        return $this->archived;
    }

    /**
     * Set team
     *
     * @param Team $team
     *
     * @return Member
     */
    public function setTeam(Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set role
     *
     * @param TeamRole $role
     *
     * @return Member
     */
    public function setRole(TeamRole $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return TeamRole
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set user
     *
     * @param FosUser $user
     *
     * @return Member
     */
    public function setUser(FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return FosUser
     */
    public function getUser()
    {
        return $this->user;
    }
}
