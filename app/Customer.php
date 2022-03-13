<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'email'
    ];
    public function getRouteKeyName()
	{
		return 'slug';
	}
}
