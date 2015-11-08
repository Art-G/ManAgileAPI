<?php

namespace ApiBundle\Entity;

/**
 * LabeledTask
 */
class LabeledTask
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ApiBundle\Entity\Label
     */
    private $label;

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
     * Set label
     *
     * @param \ApiBundle\Entity\Label $label
     *
     * @return LabeledTask
     */
    public function setLabel(\ApiBundle\Entity\Label $label = null)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return \ApiBundle\Entity\Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set task
     *
     * @param \ApiBundle\Entity\Task $task
     *
     * @return LabeledTask
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

