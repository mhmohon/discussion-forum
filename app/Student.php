<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'phone', 'gender', 'user_id', 'dep_id'
    ];

    public function user()
    {
    	$this->hasOne(User::class());
    }
}
