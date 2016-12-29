<?php

class Claimant extends Eloquent {

	protected $table = 'Claimants';
  public $timestamps = false;

  public function individual(){
    return $this->hasOne('Individual');
  }

  public function company(){
    return $this->hasOne('Company');
  }

  public function emails(){
    return $this->hasMany('Email');
  }

  public function telephones(){
    return $this->hasMany('Telephone');
  }

  public function addresses(){
    return $this->hasMany('Address');
  }
}
