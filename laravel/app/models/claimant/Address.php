<?php

class Address extends Eloquent {

	protected $table = 'Addresses';

  public $timestamps = false;

  public function claimant() {
    return $this->belongsTo('Claimant');
  }
}
