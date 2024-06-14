<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id', // Change this line
        'yield',
        'selling_price',
        'cost_price',
        'gross_margin'
    ];

    // Define the relationship between Recipe and Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
