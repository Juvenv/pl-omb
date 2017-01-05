<?php

class ManifestationController extends \BaseController {

	public function store() {
    // try {
      // $requestData = $this->reques
      $validatedData = $this->validator->validate();

      $claimantController = new ClaimantController();
      $claimant = $claimantController->store();

      $this->model->fill($validatedData);

      $this->model->claimant()->associate($claimant);
      $this->model->status()->associate(Status::find(1));
      $this->model->type()->associate(Type::find(1));
      $this->model->identification()->associate(Identification::find(1));
      $this->model->answer()->associate(Answer::find(1));

      // Senha numérica de 4 dígitos
      $this->model->password = substr(time(), 0, 4);

      $this->model->save();

      return $this->model;
    // } catch (Exception $e) {
    //   $this->model->delete();
    //   return $this->throwException($e);
    // }
	}

}
