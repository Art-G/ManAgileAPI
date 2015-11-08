<?php

namespace ApiBundle\Entity;

/**
 * TypeActivity
 */
class TypeActivity
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $patternMessage;


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
     * Set type
     *
     * @param string $type
     *
     * @return TypeActivity
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set patternMessage
     *
     * @param string $patternMessage
     *
     * @return TypeActivity
     */
    public function setPatternMessage($patternMessage)
    {
        $this->patternMessage = $patternMessage;

        return $this;
    }

    /**
     * Get patternMessage
     *
     * @return string
     */
    public function getPatternMessage()
    {
        return $this->patternMessage;
    }
}

