<?php

class Company extends Eloquent {

	protected $table = 'Companies';
  public $timestamps = false;

  public function claimant(){
    return $this->belongsTo('Claimant');
  }
}
