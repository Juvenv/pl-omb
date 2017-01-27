<?php

class Claimant extends Eloquent {

	protected $table = 'Claimants';
  protected $fillable = ['name'];

  public $timestamps = false;

  public function individual(){
    return $this->hasOne('Individual');
  }

  public function company(){
    return $this->hasOne('Company');
  }

  public function email(){
    return $this->hasOne('Email');
  }

  public function telephone(){
    return $this->hasOne('Telephone');
  }

  public function address(){
    return $this->hasOne('Address');
  }
}
