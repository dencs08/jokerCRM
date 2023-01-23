<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientInfo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title', 'info', 'client_id'
    ];
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
