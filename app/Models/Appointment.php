<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function system_user()
    {
        return $this->belongsTo(SystemUser::class);
    }
}
