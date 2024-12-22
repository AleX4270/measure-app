<?php

namespace Database\Seeders;

use App\Models\MeasurementCategory;
use App\Models\MeasurementCategoryTranslation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Language;
use App\Enums\LanguageType;

class MeasurementCategorySeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $radiationCategory = MeasurementCategory::where('symbol', 'ionizing_radiation')->first();
        if(!$radiationCategory) {
            $category = new MeasurementCategory();
            $category->symbol = 'ionizing_radiation';
            
            if($category->save()) {
                $polishTranslation = new MeasurementCategoryTranslation();
                $polishTranslation->measurement_category_id = $category->id;
                $polishTranslation->language_id = Language::where('symbol', LanguageType::PL->value)->first()->id;
                $polishTranslation->name = 'Promieniowanie jonizujące';
                $polishTranslation->remarks = 'Kategoria dla pomiarów związanych z promieniowaniem jonizującym';
                $polishTranslation->save();
 
                $englishTranslation = new MeasurementCategoryTranslation();
                $englishTranslation->measurement_category_id = $category->id;
                $englishTranslation->language_id = Language::where('symbol', LanguageType::EN->value)->first()->id;
                $englishTranslation->name = 'Ionizing radiation';
                $englishTranslation->remarks = 'Category for measurements related to ionizing radiation';
                $englishTranslation->save();
            }
        }
    }
}
