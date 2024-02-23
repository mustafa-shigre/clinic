<?php

namespace Database\Seeders;

use App\Models\Specialization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class specializationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for($i = 0; $i<5 ; $i++){
           Specialization::create([
               'name' => fake()->name()

           ]);
       }
    }
}
