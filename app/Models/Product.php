<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function collection(){
        return $this->belongsTo(Collection::class);
    }

    public function items()
    {
        return $this->hasMany(CartItems::class);
    }
}
