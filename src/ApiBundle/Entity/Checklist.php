<?php

namespace ApiBundle\Entity;

/**
 * Checklist
 */
class Checklist
{
    /**
     * @var string
     */
    private $tittle;

    /**
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ApiBundle\Entity\Task
     */
    private $task;


    /**
     * Set tittle
     *
     * @param string $tittle
     *
     * @return Checklist
     */
    public function setTittle($tittle)
    {
        $this->tittle = $tittle;

        return $this;
    }

    /**
     * Get tittle
     *
     * @return string
     */
    public function getTittle()
    {
        return $this->tittle;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     *
     * @return Checklist
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

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
     * Set task
     *
     * @param \ApiBundle\Entity\Task $task
     *
     * @return Checklist
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
