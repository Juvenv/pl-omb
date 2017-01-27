<?php

class TelephoneController extends \BaseController {

	public function store($data, $claimant) {
		$validatedData = $this->validator->validate($data);
		$telephone = new Telephone($validatedData);
		$telephone->claimant()->associate($claimant);
		return $telephone;
	}

}
