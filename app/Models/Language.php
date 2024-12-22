<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model {
    use HasFactory;

    public $timestamps = false;
    protected $attributes = [
        'is_active' => 1
    ];

    protected $fillable = ['symbol', 'name', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];
}