<?php

namespace ApiBundle\Entity;

/**
 * Member
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
     * @var \ApiBundle\Entity\Team
     */
    private $team;

    /**
     * @var \ApiBundle\Entity\TeamRole
     */
    private $role;

    /**
     * @var \ApiBundle\Entity\FosUser
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
     * @param \ApiBundle\Entity\Team $team
     *
     * @return Member
     */
    public function setTeam(\ApiBundle\Entity\Team $team = null)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return \ApiBundle\Entity\Team
     */
    public function getTeam()
    {
        return $this->team;
    }

    /**
     * Set role
     *
     * @param \ApiBundle\Entity\TeamRole $role
     *
     * @return Member
     */
    public function setRole(\ApiBundle\Entity\TeamRole $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \ApiBundle\Entity\TeamRole
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set user
     *
     * @param \ApiBundle\Entity\FosUser $user
     *
     * @return Member
     */
    public function setUser(\ApiBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ApiBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }
}

