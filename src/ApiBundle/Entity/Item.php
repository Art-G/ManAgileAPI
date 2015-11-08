<?php

namespace ApiBundle\Entity;

/**
 * Item
 */
class Item
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $position;

    /**
     * @var boolean
     */
    private $checked = '0';

    /**
     * @var \ApiBundle\Entity\Checklist
     */
    private $checklist;


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
     * Set description
     *
     * @param string $description
     *
     * @return Item
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
     * Set position
     *
     * @param integer $position
     *
     * @return Item
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
     * Set checked
     *
     * @param boolean $checked
     *
     * @return Item
     */
    public function setChecked($checked)
    {
        $this->checked = $checked;

        return $this;
    }

    /**
     * Get checked
     *
     * @return boolean
     */
    public function getChecked()
    {
        return $this->checked;
    }

    /**
     * Set checklist
     *
     * @param \ApiBundle\Entity\Checklist $checklist
     *
     * @return Item
     */
    public function setChecklist(\ApiBundle\Entity\Checklist $checklist = null)
    {
        $this->checklist = $checklist;

        return $this;
    }

    /**
     * Get checklist
     *
     * @return \ApiBundle\Entity\Checklist
     */
    public function getChecklist()
    {
        return $this->checklist;
    }
}

