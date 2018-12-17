<?php

/*
 * This file is part of AppName.
 *
 * (c) Monofony
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace App\Behat\Context\Transform;

use App\Entity\Article;
use Behat\Behat\Context\Context;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Webmozart\Assert\Assert;

class ArticleContext implements Context
{
    /**
     * @var RepositoryInterface
     */
    private $articleRepository;

    /**
     * ArticleContext constructor.
     *
     * @param RepositoryInterface $articleRepository
     */
    public function __construct(RepositoryInterface $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }

    /**
     * @Transform /^article "([^"]+)"$/
     * @Transform :article
     *
     * @param string $title
     *
     * @return Article
     */
    public function getArticleTitle($title)
    {
        /** @var Article $article */
        $article = $this->articleRepository->findOneBy(['title' => $title]);

        Assert::notNull(
            $article,
            sprintf('Article with title "%s" does not exist', $title)
        );

        return $article;
    }
}
