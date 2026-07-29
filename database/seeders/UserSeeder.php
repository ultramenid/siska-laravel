<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Seeds the login users (password hashes copied from the local dev DB, so the
 * seeded accounts can log in with the same credentials).
 */
class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->truncate();

        $now = now();

        DB::table('users')->insert([
            [
                'username' => 'sawitkalteng',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$5bRvYykjO2FmagtgIQOXgOfHyhUjPsjHOJFBYcm0Na2YYXxudYfae',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'ali',
                'email' => 'malichamdan@gmail.com',
                'password' => '$2y$10$PPemQWZ25/PdUuV.5Rf.5eBaX1DuT.TYtykHOY2aeHgT7k8L.Xhnm',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
