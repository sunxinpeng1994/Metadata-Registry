<?php

/**
 * Inherited Methods
 * @method void wantToTest( $text )
 * @method void wantTo( $text )
 * @method void execute( $callable )
 * @method void expectTo( $prediction )
 * @method void expect( $prediction )
 * @method void amGoingTo( $argumentation )
 * @method void am( $role )
 * @method void lookForwardTo( $achieveValue )
 * @method void comment( $description )
 * @method \Codeception\Lib\Friend haveFriend( $name, $actorClass = null )
 * @SuppressWarnings(PHPMD)
 */
class AcceptanceTester extends \Codeception\Actor
{

  use _generated\AcceptanceTesterActions;


  /**
   * @Given I am on :page
   */
  public function iAmOn($page)
  {
    $this->amOnPage($page);
  }


  /**
   * @Then I should see :string
   */
  public function iShouldSee($string)
  {
    $this->see($string);
  }


  /**
   * @Then I should not see :string
   */
  public function iShouldNotSee($string)
  {
    $this->dontSee($string);
  }
}