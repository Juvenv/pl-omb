<?php
Class DummyClass Extends BaseValidator {

  protected $filter = "DummyFilter";

  public function store(){
    $rules = [ 'field' => 'rules' ];
    return $this->validate($rules);
  }

  public function update(){
    $rules = [ 'field' => 'rules' ];
    return $this->validate($rules);
  }

}
