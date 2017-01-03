<?php

class Individual extends Eloquent {

	protected $table = 'Individuals';
  protected $fillable = ['cpf'];
  public $timestamps = false;

  public function claimant(){
    return $this->belongsTo('Claimant');
  }
}
