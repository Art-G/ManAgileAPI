<?php
/**
 * Created by PhpStorm.
 * User: vincentvalot
 * Date: 18/10/14
 * Time: 14:30
 */
namespace Managile\OAuthBundle\Entity;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class RefreshToken extends BaseRefreshToken
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="Client")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $client;

    /**
     * @ORM\ManyToOne(targetEntity="Managile\ApiBundle\Entity\FosUser", inversedBy="refreshTokens")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    protected $user;
}