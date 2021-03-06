<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    public static function active()
    {
    	return static::where('status', 1);
    }

    public function student()
    {
    	return $this->hasMany(Student::class);
    }
}
