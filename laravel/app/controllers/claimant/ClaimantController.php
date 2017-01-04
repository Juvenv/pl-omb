<?php

class ClaimantController extends \BaseController {

  /**
  * @throws Exception
  **/
  public function store(){
    try {

      $validatedData = $this->validator->validate();
      $this->model->fill($validatedData);

      // NOTE: O uso get do filtro aqui é uma exceção, no geral é desnecessária e pode gerar problemas
      // Aqui é apenas necessário para prepend de claimant no tipo de pessoa dentro da condição
      // Já que é algo que não pode ser controlado automaticamente
      // Use APENAS SE NECESSÁRIO em outro local
      $prepend = $this->validator->getFilter();

      // Cadastro de tipo de pessoa: Física, Jurídica ou Anônimo
      if($this->hasRequestData("${prepend}.individual")) {
        $association ="Individual";
      } else if($this->hasRequestData("{$prepend}.company")) {
        $association = "Company";
      } else {
        $association = "Anonymous";
      }

      if($association !== "Anonymous") {
        $personController = "{$association}Controller";
        $personController = new $personController('claimant');
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

      // Devolve o id do contribuinte para que possa ser utilizado no controller da Manifestação
      // NOTE: O retorno estava dando response e não modelo, se houver alguma forma de retornar o modelo
      //       seria uma melhor opção e possívelmente menos custoso, pois é uma pesquisa ao banco a menos
      return $this->model->id;
    } catch (Exception $e) {
      $this->model->delete();
      return $this->throwException($e);
    }
  }

}
