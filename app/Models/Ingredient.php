<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'category_id',
        'type_of_unit',
        'quantity',
        'unit_case',
        'cost'
    ];

    public function category()
    {
        return $this->belongsTo(IgCategory::class);
    }
}
