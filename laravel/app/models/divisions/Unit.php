<?php
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Unit extends Eloquent {
    use SoftDeletingTrait;

	protected $table = 'Units';
    protected $fillable = ['name'];

    public $timestamps = false;

    public function sectors(){
        return $this->hasMany('Sector');
    }

}
