<?php

class CompanyController extends \BaseController {

	public function store($data, $claimant) {
		$validatedData = $this->validator->validate($data);
		$company = new Company($validatedData);
		$company->claimant()->associate($claimant);
		return $company;
	}

}
