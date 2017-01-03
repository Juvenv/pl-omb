<?php
Class ClaimantValidator Extends BaseValidator {

  protected $filter = "claimant";

  public function store(){
    return [
      'name' => 'required|min:10|max:80'
    ];
  }

}
