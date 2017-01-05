<?php
Class UnitValidator Extends BaseValidator {

  protected $filter = "unit";

  public function store(){
    return ['name'=>'required'];
  }

  public function update(){
    // $rules = [ 'field' => 'rules' ];
    // return $this->validate($rules);
  }

}
