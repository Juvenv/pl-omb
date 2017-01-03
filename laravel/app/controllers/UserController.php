<?php

class UserController extends \BaseController {

	public function loggedUser(){
		// return Auth::user();
		return ['name' => "Vitor"];
	}

}
