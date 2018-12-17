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
use App\Behat\Page\Backend\Article\CreatePage;
use App\Behat\Page\Backend\Article\UpdatePage;
use App\Entity\Article;
use Behat\Behat\Context\Context;
use Webmozart\Assert\Assert;

final class ManagingArticlesContext implements Context
{
    /**
     * @var CreatePage
     */
    private $createPage;

    /**
     * @var IndexPage
     */
    private $indexPage;

    /**
     * @var UpdatePage
     */
    private $updatePage;

    /**
     * @param CreatePage $createPage
     * @param IndexPage  $indexPage
     * @pram UpdatePage $updatePage
     */
    public function __construct(
        CreatePage $createPage,
        IndexPage $indexPage,
        UpdatePage $updatePage
    ) {
        $this->createPage = $createPage;
        $this->indexPage = $indexPage;
        $this->updatePage = $updatePage;
    }

    /**
     * @Given I want to create a new article
     */
    public function iWantToCreateANewArticle()
    {
        $this->createPage->open();
    }

    /**
     * @When I want to browse articles
     */
    public function iWantToBrowseArticles()
    {
        $this->indexPage->open();
    }

    /**
     * @Given I want to modify the :article article
     */
    public function iWantToModifyAnArticle(Article $article)
    {
        $this->updatePage->open(['id' => $article->getId()]);
    }

    /**
     * @When I specify its title as :title
     * @When I do not specify its title
     */
    public function iSpecifyItsEmailAs($title = null)
    {
        $this->createPage->specifyTitle($title);
    }

    /**
     * @When I rename it to :title
     */
    public function iChangeItsTitleAs($title = null)
    {
        $this->updatePage->changeTitle($title);
    }

    /**
     * @When I add it
     * @When I try to add it
     */
    public function iAddIt()
    {
        $this->createPage->create();
    }

    /**
     * @When I save my changes
     */
    public function iSaveMyChanges()
    {
        $this->updatePage->saveChanges();
    }

    /**
     * @When I delete article with title :title
     */
    public function iDeleteArticleWithTitle($title)
    {
        $this->indexPage->deleteResourceOnPage(['title' => $title]);
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
     * @Then the article :title should appear in the website
     */
    public function theArticleShouldAppearInTheWebsite($title)
    {
        $this->indexPage->open();

        Assert::true($this->indexPage->isSingleResourceOnPage(['title' => $title]));
    }

    /**
     * @Then there should not be :title article anymore
     */
    public function thereShouldBeNoAnymore($title)
    {
        Assert::false($this->indexPage->isSingleResourceOnPage(['title' => $title]));
    }
}
