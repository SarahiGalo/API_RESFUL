<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use SoftDeletes;
    protected $fillable = [
    	'Nombre',
    	'Precio',
		'Descripcion'
	];

	public function categoria(){
		return $this->belongsTo(Categories::class);
	}
}
