<?php

namespace App\Models;

use App\Enums\AppointmentStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = ['patient_id', 'doctor_id', 'appointment_date', 'appointment_time', 'status'];

    protected function casts(): array
    {
        return [
            'status' => AppointmentStatus::class,
        ];
    }

    public function doctor()
    {
        return $this->belongsTo(DoctorProfile::class);
    }

    public function patient()
    {
        return $this->belongsTo(User::class);
    }
}
