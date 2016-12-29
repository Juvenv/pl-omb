<?php
Class ClaimantValidator Extends BaseValidator {

  protected $filter = "claimant";

  public function store(){
    $rules = [ 'name' => 'required|min:10|max:80' ];
    return $this->validate($rules);
  }

}
