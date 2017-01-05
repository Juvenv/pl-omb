<?php

class Unit extends Eloquent {

	protected $table = 'Units';
  protected $fillable = ['name'];

  public $timestamps = false;

  public function sectors(){
    return $this->hasMany('Sector');
  }

}
