<?php
Class DummyClass Extends BaseValidator {

  protected $filter = "DummyFilter";

  public function store(){
    $rules = [ '' => '' ];
    return $rules;
  }

  public function update(){
    $rules = [ '' => '' ];
    return $rules;
  }

}
