<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\Buyer;

/**
 * Buyer controller
 *
 * PHP version 7.2
 */
class BuyerController extends \Core\Controller
{
   public function index()
   {
     $data['title'] = "Buyer List";
     View::render('buyer.php', $data);
    }

    public function readBuyers()
    {
    	$response = Buyer::readBuyers();    	
		if (empty($response)) {
			die(json_encode(['status'=> "error",'message'=>"Data not found",'data'=>[]]));
		}

		die(json_encode(['status'=>"success",'message'=>"Data found",'data'=>$response]));  
    }
}
