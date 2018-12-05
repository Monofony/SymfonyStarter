@managing_articles
Feature: Browsing articles
    In order to manage articles in the website
    As an Administrator
    I want to browse articles

    Background:
        Given there is an article titled "Star Wars"
        And there is also an article titled "Game Of Thrones"
        And there is also an article titled "Back To The Future"
        And I am logged in as an administrator

    @ui
    Scenario: Browsing articles in the website
        When I want to browse articles
        Then there should be 3 articles in the list
        And I should see the article "Star Wars" in the list
        And I should see the article "Game Of Thrones" in the list
        And I should see the article "Back To The Future" in the list
