<?php

namespace Managile\ApiBundle\Entity;

/**
 * TaskList
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Managile\ApiBundle\Entity\TaskListRepository")
 */
class TaskList
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var boolean
     */
    private $archived = '0';

    /**
     * @var \ApiBundle\Entity\Board
     */
    private $board;


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
     * Set name
     *
     * @param string $name
     *
     * @return List
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return List
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return List
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
     * Set board
     *
     * @param \ApiBundle\Entity\Board $board
     *
     * @return List
     */
    public function setBoard(\ApiBundle\Entity\Board $board = null)
    {
        $this->board = $board;

        return $this;
    }

    /**
     * Get board
     *
     * @return \ApiBundle\Entity\Board
     */
    public function getBoard()
    {
        return $this->board;
    }
}
