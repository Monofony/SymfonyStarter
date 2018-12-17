@managing_articles
Feature: Articles validation
    In order to avoid making mistakes when managing articles
    As an Administrator
    I want to be prevented from adding it without specifying required fields

    Background:
        Given I am logged in as an administrator

    @ui
    Scenario: Trying to add a new article without title
        Given I want to create a new article
        When I do not specify its title
        And I try to add it
        Then I should be notified that the title is required
        And this article should not be added
