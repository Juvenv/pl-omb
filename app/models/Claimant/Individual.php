<?php

class Individual extends Eloquent {

	protected $table = 'Individuals';
  public $timestamps = false;

  public function claimant(){
    $this->belongsTo('Claimant');
  }
}
