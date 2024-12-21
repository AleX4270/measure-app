<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MeasurementTranslation extends Model {
    use HasFactory;

    protected $attributes = [
        'is_active' => 1
    ];

    protected $fillable = ['measurement_id', 'language_id', 'remarks'];

    public function measurement(): BelongsTo {
        return $this->belongsTo(Measurement::class);
    }

    public function language(): BelongsTo {
        return $this->belongsTo(Language::class);
    }
}
