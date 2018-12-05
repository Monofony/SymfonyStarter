@managing_articles
Feature: Deleting an article
    In order to get rid of deprecated articles
    As an Administrator
    I want to be able to delete articles

    Background:
        Given there is an article titled "Star Wars"
        And I am logged in as an administrator

    @ui
    Scenario: Deleting an article
        Given I want to browse articles
        When I delete article with title "Star Wars"
        Then I should be notified that it has been successfully deleted
        And there should not be "Star Wars" article anymore
