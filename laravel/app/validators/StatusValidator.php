<?php
Class StatusValidator Extends BaseValidator {

  protected $filter = "status";

  public function store(){
    $rules = [ 'name' => 'required|min:5|max:30', 'active' => 'required'];

    return $this->validate($rules);
  }

  public function update(){
    $rules = [
      'name' => 'required|min:5|max:30',
      'active' => 'required'
    ];
    return $this->validate($rules);
  }
}
