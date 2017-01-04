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
  *
  **/
  public function validate(){
    // TODO: Refatorar e diminuir
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
