<?php
Class ManifestationValidator Extends BaseValidator {

  protected $filter = "manifestation";

  public function store(){
    return [
      'description' => 'required'
    ];
  }
}
