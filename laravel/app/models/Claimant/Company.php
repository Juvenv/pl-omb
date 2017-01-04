<?php

class Company extends Eloquent {

	protected $table = 'Companies';
  protected $fillable = ['cnpj', 'contact_name'];
  protected $hidden = ['id', 'claimant_id'];
  public $timestamps = false;

  public function claimant(){
    return $this->belongsTo('Claimant');
  }
}
