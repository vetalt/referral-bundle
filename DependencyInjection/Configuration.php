<?php

namespace Vetalt\ReferralBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

    public function getConfigTreeBuilder() {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('vetalt_referral');
        
        $rootNode
                ->children()
                ->scalarNode('get_param_name')->defaultValue('ref')->cannotBeEmpty()->end()
                ->scalarNode('cookie_name')->defaultValue('reference')->cannotBeEmpty()->end()
                ->scalarNode('cookie_time')->defaultValue(3600*24*30)->cannotBeEmpty()->end()
        ;
        
        return $treeBuilder;
    }

}
