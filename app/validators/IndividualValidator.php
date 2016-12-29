<?php
Class IndividualValidator Extends BaseValidator {

  protected $filter = "individual";

  public function store(){
    $rules = [ 'cpf' => 'required|digits:11' ];
    return $this->validate($rules);
  }

}
