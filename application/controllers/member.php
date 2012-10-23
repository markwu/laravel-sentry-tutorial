<?php

class Member_Controller extends Base_Controller {

    public $restful = true;

    /**
     * Show account information
     *
     * @return void
     */
    public function get_account()
    {
        if(Sentry::check())
        {
            echo 'is logged in';
        }
        else
        {
            echo 'is not logged in';
        }
    }
}
