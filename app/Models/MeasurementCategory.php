<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MeasurementCategory extends Model {
    use HasFactory;

    protected $fillable = ['symbol', 'is_active'];

    protected $attributes = [
        'is_active' => 1
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function measurements(): HasMany {
        return $this->hasMany(Measurement::class, 'measurement_category_id');
    }

    public function translations(): HasMany {
        return $this->hasMany(MeasurementCategoryTranslation::class, 'measurement_category_id');
    }
}
