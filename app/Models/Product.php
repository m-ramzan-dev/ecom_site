<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category_id',
        'image',
        'brand',
        'model',
        'technical_specification',
        'keywords',
        'uses',
        'status',
        'warranty',
        'description',
        'createde_at',
        'updated_at'

    ];
}
