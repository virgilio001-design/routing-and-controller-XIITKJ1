<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

#[Fillable(['nis', 'name', 'email', 'gender', 'class', 'major'])]
#[Table('students')]
class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['nis', 'name', 'email', 'gender', 'class', 'major'];
}
