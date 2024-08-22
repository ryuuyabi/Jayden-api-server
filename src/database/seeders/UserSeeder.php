<?php

namespace Database\Seeders;

use App\Enums\IsActive;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 200; $i++) {
            $name = Str::random(20);
            DB::table('users')->insert([
                'sub' => \uuid_create(),
                'personal_name' => "@{$name}",
                'nickname' => $name,
                'is_active' => IsActive::ON->value,
                'email' => "{$name}@gmail.com",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
