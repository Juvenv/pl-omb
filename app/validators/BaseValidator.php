<?php

Class BaseValidator {

  protected $filter;
  protected $validator;
  protected $controller;
  public $validationFails;

  public function __construct(BaseController $controller){
    $this->controller = $controller;
  }

  protected function validate($rules){
    $data = $this->controller->getRequestData($this->filter);
    $this->validator = Validator::make($data, $rules);

    if ($this->validator->fails()){

      $fails = TranslatorHelper::translateFields($this->validator->messages()->getMessages());
      $this->validationFails['error'] = "As seguintes validações em $this->filter falharam:";
      $this->validationFails['where'] = "{ $this->filter }";
      $this->validationFails['fails'] = $fails;

      throw new ValidationFailException("Falha de Validação");
    }
  }
}
