<?php

class Manifestation extends Eloquent{

	protected $table = 'Status';
	protected $hidden = ['password', 'active'];
	protected $fillable = [
		'claimant_id',
		'status_id',
		'type_id',
		'last_occurrence_id',
		'identification_id',
		'answer_id',
		'telephone_id',
		'address_id',
		'email_id',
		'description',
		'involveds',
		'date',
		'hour',
		'password',
		'active',
		'deadline',
		'created_at',
		'updated_at'
	];

}
