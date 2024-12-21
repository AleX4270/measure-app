<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Measurement extends Model {
    use HasFactory;

    protected $attributes = [
        'is_active' => 1
    ];

    protected $fillable = ['value', 'measurement_category_id', 'measurement_unit_id', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
        'value' => 'decimal:2'
    ];

    public function category(): BelongsTo {
        return $this->belongsTo(MeasurementCategory::class, 'measurement_category_id');
    }

    public function unit(): BelongsTo {
        return $this->belongsTo(MeasurementUnit::class, 'measurement_unit_id');
    }

    public function translations(): HasMany {
        return $this->hasMany(MeasurementTranslation::class);
    }
}
