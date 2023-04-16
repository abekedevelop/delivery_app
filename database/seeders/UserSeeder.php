<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert(
            [
                'login' => 'kulan_manager',
                'password' => Hash::make('h@rdP@$$', [
                    'rounds' => 12,
                ]),
                'region_id' => 1, // ALA
                'role' => 1, // Admin
            ]
        );
    }
}
