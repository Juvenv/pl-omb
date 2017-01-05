<?php

class Manifestation extends Eloquent{

	protected $table = 'Manifestations';

  protected $with = [
    'claimant',
    'status',
    'identification',
    'answer'
  ];

  protected $hidden = [
    'claimant_id',
    'status_id',
    'type_id',
    'identification_id',
    'answer_id',
    'telephone_id',
    'address_id',
    'email_id',
    'active'
  ];

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
