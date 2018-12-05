@managing_articles
Feature: Adding a new article
    In order to extend articles database
    As an Administrator
    I want to add a new article

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Adding a new article
        Given I want to create a new article
        When I specify its title as "Star Wars"
        And I add it
        Then I should be notified that it has been successfully created
        And the article "Star Wars" should appear in the website
