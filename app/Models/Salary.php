<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $fillable = ['employee_id', 'amount', 'pay_date', 'notes'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
