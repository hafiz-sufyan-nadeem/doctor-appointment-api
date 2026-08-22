<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorProfile extends Model
{
    protected $fillable = ['specialization', 'fees', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
}
