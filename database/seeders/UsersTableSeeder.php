<?php

namespace Database\Seeders;

use App\Models\Specialization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sp = Specialization::all();
        foreach ($sp as $item) {
            User::factory()->count(3)->create([
                'specialization_id' =>$item->id
            ]);
        }

    }
}

