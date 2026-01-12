<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'user_id',
        'total_amount',
        'payment_method',
        'sale_date',
        'due_date', 
    ];

    protected $casts = [
        'sale_date' => 'datetime',
        'due_date' => 'date',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class);
    }

    // Relation vers les produits à travers orderLines
    public function products()
    {
        return $this->belongsToMany(
            Product::class,          // Modèle lié
            'order_lines',           // Table pivot
            'sale_id',               // Clé étrangère dans order_lines pour Sale
            'product_id'             // Clé étrangère dans order_lines pour Product
        )->withPivot('quantity', 'price'); // récupère quantité et prix si nécessaire
    }
}
