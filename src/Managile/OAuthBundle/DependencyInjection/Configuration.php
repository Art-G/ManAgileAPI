<?php

namespace Managile\OAuthBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('odyssapp_o_auth');

        $rootNode
            ->children()
                ->arrayNode('grants')
                    ->children()
                        ->arrayNode('facebook')
                            ->children()
                                ->scalarNode('app_id')->end()
                                ->scalarNode('app_secret')->end()
                            ->end()
                        ->end() // facebook
//                        ->arrayNode('twitter')
//                            ->children()
//                                ->scalarNode('id')->end()
//                                ->scalarNode('secret')->end()
//                            ->end()
//                        ->end()
                    ->end()
                ->end() // grants
            ->end();

        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
