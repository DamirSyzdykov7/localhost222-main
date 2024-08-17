<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';
    public function dishes()
    {
        return $this->belongsToMany(Dish::class);
    }
    public function _dop_dannye()
    {
        return $this->belongsTo(_dop_dannye::class);
    }

}
