<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Subject extends Eloquent {
    use SoftDeletingTrait;

	protected $table = 'Subjects';
  protected $fillable = ['name'];
  protected $hidden = ['sector_id', 'subject_dead_line_id'];

  public $timestamps = false;

  public function sector()
  {
    return $this->belongsTo('Sector');
  }

  public function subjectDeadLine(){
    return $this->belongsTo('SubjectDeadLine');
  }

}
