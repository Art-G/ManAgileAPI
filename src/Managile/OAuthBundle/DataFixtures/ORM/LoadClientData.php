<?php
/**
 * Created by PhpStorm.
 * User: vincentvalot
 * Date: 20/10/14
 * Time: 21:34
 */

namespace Managile\OAuthBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use FOS\OAuthServerBundle\Entity\Client;
use FOS\OAuthServerBundle\Entity\ClientManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadClientData extends AbstractFixture implements OrderedFixtureInterface, ContainerAwareInterface {

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param \Doctrine\Common\Persistence\ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        /**
         * @var ClientManager $clientManager
         */
        $clientManager = $this->container->get('fos_oauth_server.client_manager.default');

        /**
         * @var Client $client
         */
        $client = $clientManager->createClient();

        $client->setAllowedGrantTypes(array('password', 'refresh_token', 'token', 'client_credentials', 'http://odyssapp/grants/facebook'));

        $client->setRandomId('testing_id');
        $client->setSecret('testing_secret');

        $clientManager->updateClient($client);
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 2;
    }

} 