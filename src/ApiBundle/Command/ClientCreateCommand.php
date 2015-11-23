<?php
/**
 * Created by PhpStorm.
 * User: Arthur
 * Date: 23/11/2015
 * Time: 18:09
 */

namespace ApiBundle\Command;

use ApiBundle\Entity\Client;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ClientCreateCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('oauth-server:client:create')
            ->setDescription('Creates a new client')
            ->addOption(
                'redirect-uri',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Sets redirect uri for client. Use this option multiple times to set multiple redirect URIs.',
                null
            )
            ->addOption(
                'grant-type',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Sets allowed grant type for client. Use this option multiple times to set multiple grant types..',
                null
            )
            ->addOption(
                'name',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sets the name of the client',
                null
            )
            ->setHelp(
                <<<EOT
                    The <info>%command.name%</info>command creates a new client.

<info>php %command.full_name% [--redirect-uri=...] [--grant-type=...] name</info>

EOT
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $clientManager = $this->getContainer()->get('fos_oauth_server.client_manager.default');

        /**
         * @var Client $client
         */
        $client = $clientManager->createClient();
        $client->setRedirectUris($input->getOption('redirect-uri'));
        $client->setAllowedGrantTypes($input->getOption('grant-type'));
        $client->setName($input->getOption('name'));

        $clientManager->updateClient($client);

        $output->writeln(
            sprintf(
                'Added a new client with public id <info>%s</info>, secret <info>%s</info>',
                $client->getPublicId(),
                $client->getSecret()
            )
        );
    }

    //oauth/v2/token?client_id=4_ic2arr98w60c4o8cs4gkk8w848w44w00cwgcssg0kccw808ss&client_secret=24491s5r6t1c8wk4goo4s4wk88s0ocsw80kogwoowgocog4wg8&grant_type=client_credentials
}