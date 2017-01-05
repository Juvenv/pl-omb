<?php

Class BaseValidator {

  protected $prependedFilter;
  protected $filter;
  protected $controller;
  public $validator;
  public $validationFails;

  public function __construct(BaseController $controller){
    $this->controller = $controller;
  }

  /**
  * Verifica a função que chamou a validação e executa o validador da função sobre o modelo
  * @return Array() | ValidationFailException : Dados validados ou lança uma exceção
  **/
  public function validate(){
    $action = debug_backtrace()[1]["function"];

    $data = $this->controller->getRequestData($this->filter);

    // Verifica se o método a ser validado existe (store, update, etc)
    if(method_exists($this, $action)){
      $this->validator = Validator::make($data, $this->$action());

      if ($this->validator->fails()){
        $this->validationFails = $this->validator->messages()->getMessages();

        throw new ValidationFailException($this->filter, $this->validationFails);
      }
    } else {
      // Caso não exista, uma flag de validação é lançada no RESPONSE como false
      $data['validated'] = false;
    }

    return $data;
  }

  public function validateFromData($data){
    $action = debug_backtrace()[1]["function"];

    // $data = $this->controller->getRequestData($this->filter);

    // Verifica se o método a ser validado existe (store, update, etc)
    if(method_exists($this, $action)){
      $this->validator = Validator::make($data, $this->$action());

      if ($this->validator->fails()){
        $this->validationFails = $this->validator->messages()->getMessages();;

        throw new ValidationFailException($this->filter, $this->validationFails);
      }
    } else {
      // Caso não exista, uma flag de validação é lançada no RESPONSE como false
      $data['validated'] = false;
    }

    return $data;
  }

  public function getValidator(){
    return $this->validator;
  }

  public function setFilter($filter)
  {
    $this->filter = $filter;
  }

  public function getFilter()
  {
    return $this->filter;
  }

  public function prependFilter($parents)
  {
    if(!empty($parents)){
      $this->prependedFilter = $parents.'.';
      $this->filter = $parents . '.' . $this->filter;
    }
    return $this->filter;
  }

  public function getPrependedFilter(){
    return $this->prependedFilter;
  }
}
