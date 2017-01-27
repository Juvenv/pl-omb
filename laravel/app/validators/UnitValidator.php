<?php
Class UnitValidator Extends BaseValidator {

  protected $filter = "unit";

  public function store(){
    return ['name'=>'required'];
  }

}
