<?php

Class BaseValidator {

  protected $filter;
  protected $validator;
  protected $controller;
  public $validationFails;

  public function __construct(BaseController $controller){
    $this->controller = $controller;
  }

  /**
  *
  **/
  public function validate(){
    $trace = debug_backtrace();
    $caller = $trace[1];
    $action = $caller["function"];

    $data = $this->controller->getRequestData($this->filter);

    if(method_exists($this, $action)){
      $this->validator = Validator::make($data, $this->$action());

      if ($this->validator->fails()){
        $this->validationFails = $this->validator->messages()->getMessages();;

        throw new ValidationFailException($this->filter, $this->validationFails);
      }
    } else {
      $data['validated'] = false;
    }

    return $data;
  }

  public function setFilter($filter)
  {
    $this->filter = $filter;
  }
}
