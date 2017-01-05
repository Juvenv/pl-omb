<?php

class SubjectDeadLine extends Eloquent {

	protected $table = 'SubjectDeadLines';
  protected $fillable = ['days'];

  public $timestamps = false;

  public function subject()
  {
    return $this->hasOne('Subject');
  }

}
