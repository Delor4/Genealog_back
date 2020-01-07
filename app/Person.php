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
}
