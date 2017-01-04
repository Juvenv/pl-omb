<?php

class Answer extends Eloquent{

	protected $table = 'Answers';
	protected $hidden = ['active'];
	protected $fillable = ['name'];
	public $timestamps = false;

	public function manifestations()
	{
		return $this->hasMany('Manifestation');
	}
}
