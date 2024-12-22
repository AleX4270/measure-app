<?php

namespace App\Http\Controllers;

use App\Enums\LanguageType;
use App\Models\Measurement;
use App\Models\Language;
use Carbon\Carbon;
use Illuminate\View\View;

class MeasurementController extends Controller {
    public function index(): View {
        $measurements = Measurement::orderBy('created_at', 'desc')->get();


        $measurements = $measurements->map(function($measurement) {
            $measurement->category = $measurement->category->translations->firstWhere('language_id', Language::where('symbol', app()->getLocale())->first()->id)->name ?? null;
            $measurement->unit = $measurement->unit->short_symbol;
            $measurement->remarks = $measurement->translations->firstWhere('language_id', Language::where('symbol', app()->getLocale())->first()->id)->remarks ?? null;
            // $measurement->created_at = Carbon::parse($measurement->created_at)->format('d-m-Y H:i:s');
            return $measurement;
        });

        return view('measurements.index', [
            'measurements' => $measurements
        ]);
    }
}
