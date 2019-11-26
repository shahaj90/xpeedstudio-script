<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;

/**
 * Login controller
 *
 * PHP version 7.2
 */
class LoginController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
    	$data['title'] = "Login";
    	View::render('login.php', $data);
    }

    public function checkLogin()
    {
        
    }
}
