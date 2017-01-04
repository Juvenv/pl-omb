<?php

class Individual extends Eloquent {

	protected $table = 'Individuals';
  protected $fillable = ['cpf'];
  protected $hidden = ['id', 'claimant_id'];
  public $timestamps = false;

  public function claimant() {
    return $this->belongsTo('Claimant');
  }
}
