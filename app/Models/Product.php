<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function DetailOrder()
    {
        return $this->hasMany(DetailOrder::class);
    }

    public function category()
{
    return $this->belongsTo(Category::class);
}
public function typeProduct()
{
    return $this->belongsTo(TypeProduct::class);
}


}
