<?php

class ClaimantController extends \BaseController {

  /** @throws Exception **/
  public function store(){
    try {

      // Cadastro de tipo de pessoa: Física, Jurídica ou Anônimo
      // NOTE: A troca do filtro é uma exceção aqui, use apenas se necessário em outro local
      if($this->hasRequestData('individual.claimant')) {
        $this->validator->setFilter("individual.claimant");
        $association ="Individual";
      } else if($this->hasRequestData('company.claimant')) {
        $this->validator->setFilter("company.claimant");
        $association = "Company";
      } else {
        $association = "Anonymous";
      }

      $validatedData = $this->validator->validate();
      $this->model->fill($validatedData);

      if($association !== "Anonymous") {
        $personController = "{$association}Controller";
        $personController = new $personController;
        $this->model = $personController->store($this->model);
      }

      // Informações de Contato
      if($association !== "Anonymous") {
        // Cadastro de Telefone
        if($this->hasRequestData('telephone')){
          $telephoneController = new TelephoneController;
          $telephoneController->store();
        }
        // Cadastro de Email
        if($this->hasRequestData('email')){
          $emailController = new EmailController;
          $emailController->store();
        }
        // Cadastro de Endereço
        if($this->hasRequestData('address')){
          $addressController = new AddressController;
          $addressController->store();
        }
      }

      $this->model->push();
      return $this->model;
    } catch (Exception $e) {
      $this->model->delete();
      return $this->throwException($e);
    }
  }

}
