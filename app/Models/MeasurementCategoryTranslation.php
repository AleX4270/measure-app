<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MeasurementCategoryTranslation extends Model {
    use HasFactory;

    protected $fillable = ['measurement_category_id', 'language_id', 'name', 'remarks'];

    public function measurement_category(): BelongsTo {
        return $this->belongsTo(MeasurementCategory::class);
    }

    public function language(): BelongsTo {
        return $this->belongsTo(Language::class);
    }
}
