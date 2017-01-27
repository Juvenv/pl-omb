<?php

class IndividualController extends \BaseController {

	public function store($data, $claimant) {
		$validatedData = $this->validator->validate($data);
		$individual = new Individual($validatedData);
		$individual->claimant()->associate($claimant);
		return $individual;
	}

}
