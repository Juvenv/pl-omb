<?php

class Sector extends Eloquent {

	protected $table = 'Sectors';
  protected $fillable = ['name'];
  protected $hidden = ['unit_id'];

  public $timestamps = false;

  public function unit()
  {
    return $this->belongsTo('Unit');
  }

  public function subjects(){
    return $this->hasMany('Subject');
  }

}
