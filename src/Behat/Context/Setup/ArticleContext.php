<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Behat\Context\Setup;

use App\Behat\Service\SharedStorageInterface;
use App\Entity\Article;
use App\Fixture\Factory\ArticleExampleFactory;
use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;

class ArticleContext implements Context
{
    /**
     * @var SharedStorageInterface
     */
    private $sharedStorage;

    /**
     * @var ArticleExampleFactory
     */
    private $articleFactory;

    /**
     * @var RepositoryInterface
     */
    private $articleRepository;

    /**
     * @param SharedStorageInterface $sharedStorage
     * @param ArticleExampleFactory  $articleFactory
     * @param RepositoryInterface    $articleRepository
     */
    public function __construct(
        SharedStorageInterface $sharedStorage,
        ArticleExampleFactory $articleFactory,
        RepositoryInterface $articleRepository
    ) {
        $this->sharedStorage = $sharedStorage;
        $this->articleFactory = $articleFactory;
        $this->articleRepository = $articleRepository;
    }

    /**
     * @Given there is (also )an article titled :title
     */
    public function thereIsAnAdministratorIdentifiedBy(string $title): void
    {
        $this->createArticle(['title' => $title]);
    }

    /**
     * @param array $options
     */
    private function createArticle(array $options): void
    {
        /** @var Article $article */
        $article = $this->articleFactory->create($options);
        $this->articleRepository->add($article);
        $this->sharedStorage->set('article', $article);
    }
}
