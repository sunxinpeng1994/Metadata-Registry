<?php
namespace Step\Acceptance;

class admin extends \AcceptanceTester
{

    public function login()
    {
        $I = $this;
        $I->click('sign in / register');
        $I->submitForm('#login_form', [ 'nickname' => 'jonphipps', 'password' => 'phipj121' ]);
    }

}
