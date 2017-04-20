<?php
Class SubjectValidator Extends BaseValidator {

  protected $filter = "subject";

  public function store(){
    $rules = [ '' => '' ];
    return $rules;
  }

}
