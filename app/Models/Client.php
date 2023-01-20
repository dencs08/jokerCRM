<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'ceoname', 'email', 'phone', 'nip', 'city', 'zipcode',
    ];
    public $timestamps = false;
    public function salesmen()
    {
        return $this->belongsToMany(SystemUser::class);
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
