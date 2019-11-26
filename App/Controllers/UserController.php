<?php

namespace App\Controllers;

use \Core\View;
use \App\Models\User;
use Rakit\Validation\Validator;

/**
 * Buyer controller
 *
 * PHP version 7.2
 */
class UserController extends \Core\Controller
{
	public function index()
	{
		$data['title'] = "User List";
		View::render('user.php', $data);
	}

	public function readUsers()
	{
		$response = User::getAll();
		if (empty($response)) {
			die(json_encode(['status'=> "error",'message'=>"Data not found",'data'=>[]]));
		}

		die(json_encode(['status'=>"success",'message'=>"Data found",'data'=>$response]));  	

	}

	public function registerUser()
	{
		$validator = new Validator;
		$validation = $validator->validate($_POST, [
			'name' => 'required',
			'email' => 'required|email',
			'password' => 'required',
			'mobile' => 'required',
			'status' => 'required',
		]);

		if ($validation->fails()) {
			$errors = $validation->errors()->firstOfAll();
			die(json_encode(['status'=>"error",'message'=>reset($errors)]));
		}

		//Check exist value
		$exist = User::registerExistCheck($_POST);
		if ($exist['status'] == 'error') {
			die(json_encode($exist));
		}

		$response = User::registerUser($_POST);
		die(json_encode($response));		
		
	}

	public function getSingleUser()
	{
		$validator = new Validator;
		$validation = $validator->validate($_GET, [
			'id' => 'required',
		]);

		if ($validation->fails()) {
			$errors = $validation->errors()->firstOfAll();
			die(json_encode(['status'=>"error",'message'=>reset($errors)]));
		}

		$response = User::getSingleUser($_GET);
		die(json_encode($response));

	}

	public function updateUser()
	{
		$validator = new Validator;
		$validation = $validator->validate($_POST, [
			'name' => 'required',
			'email' => 'required|email',
			'mobile' => 'required',
			'status' => 'required',
		]);

		if ($validation->fails()) {
			$errors = $validation->errors()->firstOfAll();
			die(json_encode(['status'=>"error",'message'=>reset($errors)]));
		}

		//Check exist value
		$exist = User::updateExistCheck($_POST);
		if ($exist['status'] == 'error') {
			die(json_encode($exist));
		}

		$response = User::updateUser($_POST);
		die(json_encode($response));		
		
	}

	public function deleteUser()
	{		
		$validator = new Validator;
		$validation = $validator->validate($_POST, [
			'id' => 'required',
		]);

		if ($validation->fails()) {
			$errors = $validation->errors()->firstOfAll();
			die(json_encode(['status'=>"error",'message'=>reset($errors)]));
		}

		$response = User::deleteUser($_POST);
		die(json_encode($response));		
		
	}
}
