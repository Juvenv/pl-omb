<?php

class ManifestationController extends \BaseController {

	public function store() {
    // try {
      $validatedData = $this->validator->validate();

      $claimantController = new ClaimantController();
      $claimantId = $claimantController->store();
      $claimant = Claimant::findOrFail($claimantId);

      $this->model->fill($validatedData);

      dd($this->model->description);


      $this->model->claimant()->associate($claimant);
      $this->model->status()->associate(Status::find(1));
      $this->model->type()->associate(Type::find(1));
      $this->model->identification()->associate(Identification::find(1));
      $this->model->answer()->associate(Answer::find(1));

      $this->model->password = substr(hexdec(time()), 0, 4);

      $this->model->save();

      return $this->model;
    // } catch (Exception $e) {
    //   $this->model->delete();
    //   return $this->throwException($e);
    // }
	}

}
