<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_year',
        'sex',
        'parent_id',
    ];
	
	public function childrens() {
		return $this->hasMany(Person::class, 'parent_id');
	}
	public function parent() {
		return $this->belongsTo(Person::class, 'parent_id');
	}
}
