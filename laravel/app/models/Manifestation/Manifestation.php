<?php

class Manifestation extends Eloquent{

	protected $table = 'Status';
	protected $hidden = ['password', 'active'];
	protected $fillable = [
		'last_occurrence_id',
		'description',
		'involveds',
		'date',
		'hour'
	];

  public function claimant()
  {
    return $this->belongsTo('Claimant');
  }

  public function status()
  {
    return $this->belongsTo('Status');
  }

  public function type()
  {
    return $this->belongsTo('Type');
  }

  public function identification()
  {
    return $this->belongsTo('Identification');
  }

  public function answer()
  {
    return $this->belongsTo('Answer');
  }

}
