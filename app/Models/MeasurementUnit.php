<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MeasurementUnit extends Model {
    use HasFactory;

    protected $fillable = ['symbol', 'short_symbol', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function measurements(): HasMany {
        return $this->hasMany(Measurement::class, 'measurement_unit_id');
    }
}