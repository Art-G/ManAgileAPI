<?php

namespace ApiBundle\Entity;

/**
 * Label
 */
class Label
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $color;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ApiBundle\Entity\Team
     */
    private $team;


    /**
     * Set name
     *
     * @param string $name
     *
     * @return Label
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
     * Set color
     *
     * @param string $color
     *
     * @return Label
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
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
     * Set team
     *
     * @param \ApiBundle\Entity\Team $team
     *
     * @return Label
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
}
