<?php

class ManifestationController extends \BaseController {

	public function store() {
      $validatedData = $this->validator->validate();

      $claimantController = (new ClaimantController)->storeOrUpdate($validatedData);

      $manifestation->fill($validatedData);

      $manifestation->claimant()->associate($claimant);
      $manifestation->status()->associate(Status::find($validatedData['status']));
      $manifestation->type()->associate(Type::find($validatedData['type']));
      $manifestation->identification()->associate(Identification::find($validatedData['identification']));
      $manifestation->answer()->associate(Answer::find($validatedData['answer']));

      // Senha numérica de 4 dígitos
      $manifestation->password = substr(time(), 0, 4);

      $manifestation->save();
	}

}
