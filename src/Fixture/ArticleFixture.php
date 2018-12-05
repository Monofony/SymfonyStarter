<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Fixture;

use Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition;

class ArticleFixture extends AbstractResourceFixture
{
    /**
     * {@inheritdoc}
     */
    public function getName(): string
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    protected function configureResourceNode(ArrayNodeDefinition $resourceNode)
    {
        $resourceNode
            ->children()
                ->scalarNode('street')->cannotBeEmpty()->end()
                ->scalarNode('city')->cannotBeEmpty()->end()
                ->scalarNode('postcode')->cannotBeEmpty()->end()
        ;
    }
}
