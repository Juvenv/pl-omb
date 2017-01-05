<?php
Class ManifestationValidator Extends BaseValidator {

  protected $filter = "manifestation";

  public function store(){
    return [
      'description' => 'required'
    ];
  }

  public function update(){
    // $rules = [ 'field' => 'rules' ];
    // return $this->validate($rules);
    return [
      'description' => 'required'
    ];
  }

}
