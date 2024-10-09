<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactiontype extends Model
{
    use HasFactory;

    protected $fillable = ['tipo_transaccion'];
    
    public function transactiontypes(){
        return $this->hasMany(transaction::class);
    }

    public function user(){
        return $this->hasOne(user::class);
    }
}
