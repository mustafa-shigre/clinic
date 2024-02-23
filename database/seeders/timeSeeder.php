<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class timeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDate = now()->setHour(8)->minute(0); // Start at 8:00 AM
        $endDate = now()->setHour(17)->minute(0); // End at 5:00 PM

        while ($currentDate <= $endDate) {
            DB::table('available_dates')->insert([
                'time' => $currentDate->startOfHour()->format('H:i:s'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $currentDate->addMinutes(60); // Add 30 minutes interval
        }
    }
}
