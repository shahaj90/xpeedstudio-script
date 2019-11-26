<?php

namespace App\Controllers;

use \Core\View;
use App\Config;

/**
 * Home controller
 *
 * PHP version 7.2
 */
class HomeController extends \Core\Controller
{

    /**
     * Show the index page
     *
     * @return void
     */
    public function index()
    {
    	header("Location:". Config::HOST_URL. "/Buyer"); 
    }
}
