<?php

class ClaimantController extends \BaseController {

  public function store($data) {
    $validatedData = $this->validator->validate($data['claimant']);
    $claimant = Claimant::create($validatedData['claimant']);
    return $claimant;
  }

  public function update($claimant, $data){
    $claimant->fill($data)->update();
    return $claimant;
  }

  /* Verifica a existencia do contribuinte e encaminha para o método correto */
  public function storeOrUpdate($data) {
    if(isset($data['individual'])) {
      $claimant = Individual::where(['cpf' => $data['individual']['cpf']])->first();
    }

    if(isset($data['company'])) {
      $claimant = Company::where(['cnpj' => $data['company']['cnpj']])->first();
    }

    if($claimant === null){
      $this->store($data);
    } else {
      $this->update($claimant, $data);
    }
  }

}
