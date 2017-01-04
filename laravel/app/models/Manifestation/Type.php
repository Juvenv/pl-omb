<?php

class Type extends Eloquent{

	protected $table = 'Types';
	protected $hidden = ['active'];
	protected $fillable = ['name'];
	public $timestamps = false;

	public function manifestations()
	{
		return $this->hasMany('Manifestation');
	}
}
