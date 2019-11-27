<?php

namespace App\Controllers;

use \Core\View;
use App\Config;
use \App\Models\Item;
use Rakit\Validation\Validator;

/**
 * Example user model
 *
 * PHP version 7.2
 */
class ItemController extends \Core\Model
{

	public function index()
	{		
		header("Location:". Config::HOST_URL. "/AddItem"); 
	}

	public function addItem()
	{
		$data['title'] = "Add Item";
		View::render('addItem.php',$data);
	}

	public function saveItem()
	{    	
		$validator = new Validator;
		$validation = $validator->validate($_POST, [
			'amount' => 'required|numeric',
			'buyer' => 'required|alpha_num|alpha_spaces|max:20',
			'receipt_id' => 'required|alpha',
			'items' => 'array',
			'items.*' => 'required|alpha',
			'buyer_email' => 'required|email',
			'note' => 'required|max:30',
			'city' => 'required|alpha_spaces',
			'phone' => 'required|numeric',
			'entry_by' => 'required|numeric',
		]);

		if ($validation->fails()) {
			$errors = $validation->errors()->firstOfAll();
			$error = reset($errors);			
			if (is_array($error)) {
				$error = reset($error);
			}
			
			die(json_encode(['status'=>"error",'message'=>$error]));
		}

		$response = Item::saveItem($_POST);		
		die(json_encode($response));

	}

	public function itemList()
	{
		$data['title'] = "Item List";
		View::render('itemList.php', $data);
	}

	public function searchItems()
	{
		$validator = new Validator;
		$validation = $validator->validate($_POST, [
			'from_date' => 'date',
			'to_date' => 'date',
			'user_id' => 'numeric',
		]);

		if ($validation->fails()) {
			$errors = $validation->errors()->firstOfAll();
			die(json_encode(['status'=>"error",'message'=>reset($errors),'data'=>[]]));
		}

		if (!empty($_POST['from_date']) && !empty($_POST['to_date'])) {
			$fromDate = strtotime($_POST['from_date']);
			$toDate = strtotime($_POST['to_date']);	
			if($fromDate > $toDate){
				die(json_encode(['status'=>"error",'message'=>"Please check date range",'data'=>[]]));
			}			
		}

		$response= Item::searchItems($_POST);
		die(json_encode(['status'=>"success",'data' => $response]));

	}
}
