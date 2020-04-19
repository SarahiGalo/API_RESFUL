<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'Nombre'
	];

	public function productos(){
		return $this->hasMany(Productos::class);
	}
}