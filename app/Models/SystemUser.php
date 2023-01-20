<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemUser extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function clients()
    {
        return $this->belongsToMany(Client::class);
    }
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
    public function emails()
    {
        return $this->hasMany(Email::class);
    }
}
