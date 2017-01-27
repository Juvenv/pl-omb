<?php

class EmailController extends \BaseController {

	public function store($data, $claimant) {
		$validatedData = $this->validator->validate($data);
		$email = new Email($validatedData);
		$email->claimant()->associate($claimant);
		return $email;
	}

}
