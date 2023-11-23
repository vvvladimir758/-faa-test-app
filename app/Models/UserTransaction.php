<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    use HasFactory;
    
    protected $table ='users_transaction';
    
    protected $fillable = [
        'amount',
        'type',
        'user_id'
    ];
}
