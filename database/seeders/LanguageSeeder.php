<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Language;
use App\Enums\LanguageType;

class LanguageSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        Language::firstOrCreate(
            ['symbol' => LanguageType::PL->value],
            [
                'symbol' => LanguageType::PL->value,
                'name' => 'Polski'
            ]
        );

        Language::firstOrCreate(
            ['symbol' => LanguageType::EN->value],
            [
                'symbol' => LanguageType::EN->value,
                'name' => 'English'
            ]
        );
    }
}
