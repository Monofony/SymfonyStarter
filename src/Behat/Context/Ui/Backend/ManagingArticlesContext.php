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

namespace App\Behat\Context\Ui\Backend;

use App\Behat\Page\Backend\Article\IndexPage;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

final class ManagingArticlesContext implements Context
{
    /**
     * @var IndexPage
     */
    private $indexPage;

    /**
     * @param IndexPage $indexPage
     */
    public function __construct(
        IndexPage $indexPage
    ) {
        $this->indexPage = $indexPage;
    }

    /**
     * @When I want to browse articles
     */
    public function iWantToBrowseArticles()
    {
        $this->indexPage->open();
    }

    /**
     * @Then /^there should be (\d+) articles in the list$/
     */
    public function iShouldSeeArticlesInTheList(int $number = 1): void
    {
        Assert::same($this->indexPage->countItems(), (int) $number);
    }

    /**
     * @Then I should (also )see the article :title in the list
     */
    public function theArticleShouldAppearInTheWebsite($title)
    {
        $this->indexPage->open();

        Assert::true($this->indexPage->isSingleResourceOnPage(['title' => $title]));
    }
}
