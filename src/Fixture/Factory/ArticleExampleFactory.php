<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Fixture\Factory;

use App\Entity\Article;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Symfony\Component\OptionsResolver\Options;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArticleExampleFactory extends AbstractExampleFactory
{
    /**
     * @var FactoryInterface
     */
    private $addressFactory;

    /**
     * @var \Faker\Generator
     */
    private $faker;

    /**
     * @var OptionsResolver
     */
    private $optionsResolver;

    /**
     * @param FactoryInterface $addressFactory
     */
    public function __construct(FactoryInterface $addressFactory)
    {
        $this->addressFactory = $addressFactory;

        $this->faker = \Faker\Factory::create();
        $this->optionsResolver = new OptionsResolver();

        $this->configureOptions($this->optionsResolver);
    }

    /**
     * {@inheritdoc}
     */
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setDefault('title', function (Options $options) {
                return ucfirst($this->faker->words(3, true));
            });
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $options = [])
    {
        $options = $this->optionsResolver->resolve($options);

        /** @var Article $article */
        $article = $this->addressFactory->createNew();
        $article->setTitle($options['title']);

        return $article;
    }
}
