<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [
        'transactionID', 'commision', 'price', 'netamount', 'status', 'client_id', 'user_id',
    ];
    // public $timestamps = false;
    public function client()
    {
        return $this->belongsTo(Client::class);
    }    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
