<?php

class Status extends Eloquent{

	protected $table = 'Status';
	protected $hidden = ['active'];
	protected $fillable = ['name'];
	public $timestamps = false;

	public function teste()
	{
		return $this->belongsTo('Teste');
	}
}
