<?php

class Answer extends Eloquent{

	protected $table = 'Answers';
	protected $hidden = ['active'];
	protected $fillable = ['name'];
	public $timestamps = false;

	public function manifestations() {
		return $this->hasMany('Manifestation');
	}

	public function getAnswerType($id) {
		$type = Answer::findOrFail($id);
		if($type == 'Correspondência'){ 
			return 'address';
		};
		if($type == 'E-Mail'){ 
			return 'email';
		};
		if($type == 'Telefone'){ 
			return 'telephone';
		};
	}

}
