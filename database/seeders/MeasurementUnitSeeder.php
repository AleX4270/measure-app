<?php

namespace Database\Seeders;

use App\Models\MeasurementUnit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MeasurementUnitSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        $microsievertsPerHourUnit = MeasurementUnit::where('symbol', 'microsieverts_per_hour')->first();
        if(!$microsievertsPerHourUnit) {
            $microsievertsPerHourUnit = new MeasurementUnit();
            $microsievertsPerHourUnit->symbol = 'microsieverts_per_hour';
            $microsievertsPerHourUnit->short_symbol = 'µSv/h';
            $microsievertsPerHourUnit->save();
        }
    }
}
