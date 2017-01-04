<?php

class Identification extends Eloquent{

	protected $table = 'Identifications';
	protected $hidden = ['active'];
	protected $fillable = ['name'];
	public $timestamps = false;

	public function manifestations()
	{
		return $this->hasMany('Manifestation');
	}
}
