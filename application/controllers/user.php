<?php

class User_Controller extends Base_Controller {

    public $restful = true;

    /**
     * Show register form
     *
     * @return void
     */
    public function get_register()
    {
        return View::make('user.registration');
    }

    /**
     * Do register
     *
     * @return void
     */
    public function post_register()
    {
        // data pass to the view
        $data = array();

        // do valiation
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        );

        $input = Input::get();
        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('user/register')->with_input()->with_errors($validation);
        }

        // add user
        try
        {
            $user = Sentry::user()->register(array(
                'email' => Input::get('email'),
                'password' => Input::get('password')
            ));

            if(!$user)
            {
                $data['errors'] = 'There was an issue when add user to database';
            }
        }
        catch (Sentry\SentryException $e)
        {
            $data['errors'] = $e->getMessage();
        }

        if (array_key_exists('errors', $data))
        {
            return Redirect::to('user/register')->with_input()->with('errors', $data['errors']);
        }
        else
        {
            return Redirect::to('user/login')->with('hash_link', URL::base().'/user/activate/'.$user['hash']);
        }
    }

    public function get_activate($email = null, $hash = null)
    {
        try
        {
            $activate_user = Sentry::activate_user($email, $hash);

            if($activate_user)
            {
                return Redirect::to('user/login');
            }
            else
            {
                echo 'The user was not activated';
            }
        }
        catch (Sentry\SentryEXception $e)
        {
            echo $e->getMessage();
        }
    }

    /**
     * Show login form
     *
     * @return void
     */
    public function get_login()
    {
        return View::make('user.login');
    }

    /**
     * Do login
     *
     * @return void
     */
    public function post_login()
    {
        // do valiation
        $rules = array(
            'email' => 'required|email',
            'password' => 'required'
        );

        $input = Input::get();
        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('user/login')->with_input()->with_errors($validation);
        }

        try
        {
            $valid_login = Sentry::login(Input::get('email'), Input::get('password'), Input::get('remember'));

            if($valid_login)
            {
                return Redirect::to('member/account');
            }
            else
            {
                $data['errors'] = "Invalid login!";
            }
        }
        catch (Sentry\SentryException $e)
        {
            $data['errors'] = $e->getMessage();
        }

        return Redirect::to('user/login')->with_input()->with('errors', $data['errors']);
    }

    /**
     * Do logout
     *
     * @return void
     */
    public function get_logout()
    {
        Sentry::logout();
        return Redirect::to('user/login');
    }

    public function get_reset()
    {
        return View::make('user.reset');
    }

    public function post_reset()
    {
        // data pass to the view
        $data = array();

        // do valiation
        $rules = array(
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        );

        $input = Input::get();
        $validation = Validator::make($input, $rules);

        if ($validation->fails()) {
            return Redirect::to('user/reset')->with_input()->with_errors($validation);
        }

        // add user
        try
        {
            $reset = Sentry::reset_password(Input::get('email'), Input::get('password'));

            if(!$reset)
            {
                $data['errors'] = 'There was an issue when reset the password';
            }
        }
        catch (Sentry\SentryException $e)
        {
            $data['errors'] = $e->getMessage();
        }

        if (array_key_exists('errors', $data))
        {
            return Redirect::to('user/reset')->with_input()->with('errors', $data['error']);
        }
        else
        {
            return Redirect::to('user/login')->with('hash_link', URL::base().'/user/confirmation/'.$reset['link']);
        }
    }

    public function get_confirmation($email = null, $hash = null)
    {
        try
        {
            $confirmation = Sentry::reset_password_confirm($email, $hash);

            if($confirmation)
            {
                return Redirect::to('user/login');
            }
            else
            {
                echo 'Unable to reset password';
            }
        }
        catch (Sentry\SentryException $e) 
        {
            echo $e->getMessage();
        }
    }
}
