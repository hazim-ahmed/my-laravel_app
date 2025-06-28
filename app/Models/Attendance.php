<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id',
        'date',
        'check_in',
        'check_out'
    ];
      protected $casts = [
        'date' => 'date',        // يحوّل date إلى كائن Carbon
        'check_in'  => 'datetime:H:i',   // اختياري ـ إذا أردت معالجة الوقت أيضاً
        'check_out' => 'datetime:H:i',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
