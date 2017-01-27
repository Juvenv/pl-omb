<?php

class BaseController extends Controller {

  protected $model;
  protected $modelName;

  public function __construct(){
    // Main Name das classes filhas (Modelos e Validadores)
    // Ex: Com ClaimantController, será instanciado o modelo Claimant e o validador ClaimantValidator
    $name = str_replace("Controller", "", get_class($this));

    // Seta o modelo e seu nome (OBRIGATORIAMENTE)
    $this->model = new $name;
    $this->modelName = $name;

    // Seta a classe validadora
    $validatorClass = "{$name}Validator";
    if(class_exists($validatorClass)){
      $this->validator = new $validatorClass($this);
    } else {
      Log::error("Classe validadora $validatorClass não foi encontrada.");
    }

	}

	// Criado pelo Laravel
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
