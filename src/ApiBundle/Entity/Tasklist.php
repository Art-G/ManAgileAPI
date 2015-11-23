<?php

namespace ApiBundle\Entity;

/**
 * Tasklist
 */
class Tasklist
{
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
     * @var integer
     */
    private $id;

    /**
     * @var \ApiBundle\Entity\Board
     */
    private $board;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Tasklist
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
     * @return Tasklist
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
     * @return Tasklist
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set board
     *
     * @param \ApiBundle\Entity\Board $board
     *
     * @return Tasklist
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
