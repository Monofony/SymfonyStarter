@managing_articles
Feature: Deleting multiple articles
    In order to get rid of spam articles in an efficient way
    As an Administrator
    I want to be able to delete multiple articles at once

    Background:
        Given there is an article titled "Star Wars"
        And there is also an article titled "Game Of Thrones"
        And there is also an article titled "Back To The Future"
        And I am logged in as an administrator

    @ui @javascript
    Scenario: Deleting multiple articles at once
        Given I browse articles
        And I check the "Star Wars" article
        And I also check the "Game Of Thrones" article
        And I delete them
        Then I should be notified that they have been successfully deleted
        And I should see a single article in the list
        And I should see the article "Back To The Future" in the list
