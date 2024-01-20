<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SignIn extends Authenticatable
{
    use HasFactory;
    protected $table = 'SignIn';
    protected $fillable = [
        'login',
    ];
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }
}
