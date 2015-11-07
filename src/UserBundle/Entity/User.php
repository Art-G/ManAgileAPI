<?php
// src/UserBundle/Entity/User.php

namespace UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
use JMS\Serializer\Annotation\Groups;
use JMS\Serializer\Annotation\VirtualProperty;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 *
 * @ExclusionPolicy("all")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $username;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Details"})
     */
    protected $usernameCanonical;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $email;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Details"})
     */
    protected $emailCanonical;

    /**
     * @ORM\Column(type="boolean")
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $enabled;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $salt;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $password;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Details"})
     */
    protected $plainPassword;

    /**
     * @ORM\Column(type="DateTime")
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $lastLogin;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $confirmationToken;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     * @Expose
     * @Groups({"Details"})
     */
    protected $passwordRequestedAt;

    /**
     * @ORM\Column(type="Collection")
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $groups;

    /**
     * @ORM\Column(type="boolean")
     * @Expose
     * @Groups({"Details"})
     */
    protected $locked;

    /**
     * @ORM\Column(type="boolean")
     * @Expose
     * @Groups({"Details"})
     */
    protected $expired;

    /**
     * @ORM\Column(type="DateTime")
     * @Expose
     * @Groups({"Details"})
     */
    protected $expiresAt;

    /**
     * @ORM\Column(type="array")
     * @Expose
     * @Groups({"Me","Details"})
     */
    protected $roles;

    /**
     * @ORM\Column(type="boolean")
     * @Expose
     * @Groups({"Details"})
     */
    protected $credentialsExpired;

    /**
     * @ORM\Column(type="DateTime")
     * @Expose
     * @Groups({"Details"})
     */
    protected $credentialsExpireAt;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
