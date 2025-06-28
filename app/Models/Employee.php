<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'job_title_id',
        'department_id',
        'hired_at'
    ];
     protected $casts = [
        'hired_at' => 'date',    // يحوّل hired_at إلى كائن Carbon
    ];

    public function jobTitle()
    {
        return $this->belongsTo(JobTitle::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }

    public function salaries()
    {
        return $this->hasMany(Salary::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
