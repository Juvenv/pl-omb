<?php

class ManifestationController extends \BaseController {

	public function store() {
    try {
      $validatedData = $this->validator->validate();

      $claimantController = new ClaimantController;
      $claimantController->store();


    } catch (Exception $e) {
      $this->model->delete();
      return $this->throwException($e);
    }
	}

}
