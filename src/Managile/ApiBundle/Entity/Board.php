<?php

namespace Managile\ApiBundle\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Managile\ApiBundle\Entity\BoardRepository")
 */
class Board
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
     * @var string
     */
    private $description;

    /**
     * @var boolean
     */
    private $favorite;

    /**
     * @var boolean
     */
    private $archived;

    /**
     * @var Team
     */
    private $team;

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
     * @return Board
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
     * Set description
     *
     * @param string $description
     *
     * @return Board
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set favorite
     *
     * @param boolean $favorite
     *
     * @return Board
     */
    public function setFavorite($favorite)
    {
        $this->favorite = $favorite;

        return $this;
    }

    /**
     * Get favorite
     *
     * @return boolean
     */
    public function getFavorite()
    {
        return $this->favorite;
    }

    /**
     * Set archived
     *
     * @param boolean $archived
     *
     * @return Board
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
     * @return Board
     */
    public function setTeam(Team $team = null)
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
