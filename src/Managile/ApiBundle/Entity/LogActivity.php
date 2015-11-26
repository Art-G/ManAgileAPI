<?php

namespace Managile\ApiBundle\Entity;

/**
 * LogActivity
 */
class LogActivity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $datetimeActivity;

    /**
     * @var Managile\ApiBundle\Entity\TaskList
     */
    private $list;

    /**
     * @var Managile\ApiBundle\Entity\Task
     */
    private $task;

    /**
     * @var Managile\ApiBundle\Entity\TypeActivity
     */
    private $typeActivity;

    /**
     * @var Managile\ApiBundle\Entity\FosUser
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
     * Set datetimeActivity
     *
     * @param \DateTime $datetimeActivity
     *
     * @return LogActivity
     */
    public function setDatetimeActivity($datetimeActivity)
    {
        $this->datetimeActivity = $datetimeActivity;

        return $this;
    }

    /**
     * Get datetimeActivity
     *
     * @return \DateTime
     */
    public function getDatetimeActivity()
    {
        return $this->datetimeActivity;
    }

    /**
     * Set list
     *
     * @param \ApiBundle\Entity\TaskList $list
     *
     * @return LogActivity
     */
    public function setList(\ApiBundle\Entity\TaskList $list = null)
    {
        $this->list = $list;

        return $this;
    }

    /**
     * Get list
     *
     * @return \ApiBundle\Entity\TaskList
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Set task
     *
     * @param \ApiBundle\Entity\Task $task
     *
     * @return LogActivity
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

    /**
     * Set typeActivity
     *
     * @param \ApiBundle\Entity\TypeActivity $typeActivity
     *
     * @return LogActivity
     */
    public function setTypeActivity(\ApiBundle\Entity\TypeActivity $typeActivity = null)
    {
        $this->typeActivity = $typeActivity;

        return $this;
    }

    /**
     * Get typeActivity
     *
     * @return \ApiBundle\Entity\TypeActivity
     */
    public function getTypeActivity()
    {
        return $this->typeActivity;
    }

    /**
     * Set user
     *
     * @param Managile\ApiBundle\Entity\FosUser $user
     *
     * @return LogActivity
     */
    public function setUser(Managile\ApiBundle\Entity\FosUser $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return Managile\ApiBundle\Entity\FosUser
     */
    public function getUser()
    {
        return $this->user;
    }
}
