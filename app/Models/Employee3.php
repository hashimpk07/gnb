<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee3 extends Model
{
    protected $table = 'employees_3';
    use HasFactory;
    protected $fillable = ['name', 'department', 'job_title', 'email', 'hire_date', 'salary', 'location', 'status', 'performance_rating'];

}
