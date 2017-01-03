<?php
Class IndividualValidator Extends BaseValidator {

  protected $filter = "individual";

  public function store(){
    return [
      'cpf' => 'required|digits:11'
    ];
  }

}
