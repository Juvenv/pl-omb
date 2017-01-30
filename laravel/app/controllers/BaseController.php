<?php

class BaseController extends Controller {

  protected $validator;

  public function __construct(){
    // Main Name das classes filhas (Modelos e Validadores)
    // Ex: Com ClaimantController, será instanciado o modelo Claimant e o validador ClaimantValidator
    $name = str_replace("Controller", "", get_class($this));

    // Seta a classe validadora
    $validatorClass = "{$name}Validator";
    if(class_exists($validatorClass)){
      $this->validator = new $validatorClass($this);
    } else {
      Log::error("Classe validadora $validatorClass não foi encontrada. Verifique sua necessidade");
    }

	}
}
