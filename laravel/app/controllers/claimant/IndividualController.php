<?php

class IndividualController extends \BaseController {

  /**
  * Verifica a existência de uma pessoa física a altera, caso não exista, o CPF é adicionado junto a pessoa;
  * @param $claimant : Contribuinte, ao qual terá sua pessoa vinculada ao cadastro de pessoa física
  * @return Individual : Modelo contendo já a chave primaria anexada
  **/
	public function store($claimant)
	{
    $validatedData = $this->validator->validate();

    $this->model = Individual::firstOrNew(['cpf' => $validatedData['cpf']]);

    // Confere a já existencia da pessoa física:
    // Caso exista, os valores do contribuinte também são alterados (atualmente só o nome)
    // Caso não exista, um novo contribuinte é adicionado
    if(isset($this->model->id)) {
      $lastClaimant = $this->model->claimant; // Pega o já cadastrado
      $lastClaimant->fill($claimant->toArray()); // Altera os dados e mantém o id
      $claimant = $lastClaimant; // Coloca o antigo na variável a ser cadastrada no banco
    }
    $claimant->save();

    $this->model->fill($validatedData);
    $this->model->claimant()->associate($claimant);
    $this->model->push();

    return $claimant;
	}

}
