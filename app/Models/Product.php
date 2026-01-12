<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
    'name',
    'price',
    'quantity',
    'description',
    'category_id',
    'image',
];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sales()
    {
        return $this->belongsToMany(Sale::class, 'order_lines')
                    ->withPivot('quantity', 'price');
    }
}
