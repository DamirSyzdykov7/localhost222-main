<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class _dop_dannye extends Model
{
    use HasFactory;
    protected $table = '_dop_dannye';
    public function SignIn()
    {
        return $this->hasMany(SignIn::class);
    }
    public function Cart()
    {
        return $this->hasMany(Cart::class);
    }
}
