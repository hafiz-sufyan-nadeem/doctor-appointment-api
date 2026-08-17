<?php

namespace App\Models;

use App\Enums\Weekday;
use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $fillable = ['doctor_id', 'day', 'startTime', 'endTime'];

    protected function casts():array
    {
        return [
            'day' => Weekday::class,
        ];
    }

    public function doctorProfile()
    {
        return $this->belongsTo(DoctorProfile::class);
    }
}

