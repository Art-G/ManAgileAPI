<?php

namespace Managile\ApiBundle\Entity;

/**
 * MemberTask
 */
class MemberTask
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ApiBundle\Entity\Member
     */
    private $member;

    /**
     * @var \ApiBundle\Entity\Task
     */
    private $task;


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
     * Set member
     *
     * @param \ApiBundle\Entity\Member $member
     *
     * @return MemberTask
     */
    public function setMember(\ApiBundle\Entity\Member $member = null)
    {
        $this->member = $member;

        return $this;
    }

    /**
     * Get member
     *
     * @return \ApiBundle\Entity\Member
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set task
     *
     * @param \ApiBundle\Entity\Task $task
     *
     * @return MemberTask
     */
    public function setTask(\ApiBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \ApiBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }
}
