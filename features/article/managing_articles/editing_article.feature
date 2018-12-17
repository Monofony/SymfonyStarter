@managing_articles
Feature: Editing article
    In order to change article details
    As an Administrator
    I want to be able to edit an article

    Background:
        Given there is an article titled "Star Wars"
        And I am logged in as an administrator

    @ui
    Scenario: Renaming the article
        Given I want to modify the "Star Wars" article
        When I rename it to "Game Of Thrones"
        And I save my changes
        Then I should be notified that it has been successfully edited
        And I should see the article "Game Of Thrones" in the list
        But there should not be "Star Wars" article anymore
