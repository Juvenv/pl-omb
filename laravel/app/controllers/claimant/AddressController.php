<?php

class AddressController extends \BaseController {

	public function store($data, $claimant) {
		$address = new Address($validatedData);
		$address->claimant()->associate($claimant);
		$address->save();

		return $address;
	}

	public function update($data, $claimant) {
		$address = $claimant->address;
		$address->fill($data)->update();

		return $address;
	}

	/* Verifica a existencia do endereço e encaminha para o método correto */
	public function storeOrUpdate($data, $claimant){
		$validatedData = $this->validator->validate($data);

		if($claimant->address === null){
			$this->store($data, $claimant);
		} else {
			$this->update($data, $claimant);
		}
	}

}
