<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Sector extends Eloquent {
    use SoftDeletingTrait;

    protected $table = 'Sectors';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function unit() {
        return $this->belongsTo('Unit');
    }

    public function subjects() {
        return $this->hasMany('Subject');
    }

}
