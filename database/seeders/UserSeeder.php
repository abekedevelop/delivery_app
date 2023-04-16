<?php

namespace Database\Seeders;

use App\Domain\Entity\User;
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
                'login' => '7771234567',
                'password' => Hash::make('h@rdP@$$', [
                    'rounds' => 12,
                ]),
                'region_id' => 1, // ALA
                'role' => User::USER_ROLE_ADMIN,
            ]
        );
    }
}
