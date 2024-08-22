<?php

namespace Database\Seeders;

use App\Enums\IsActive;
use App\Enums\Operator\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 200; $i++) {
            $name = Str::random(20);
            DB::table('operators')->insert([
                'sub' => \uuid_create(),
                'personal_name' => "@{$name}",
                'nickname' => $name,
                'is_active' => IsActive::ON->value,
                'email' => "{$name}@gmail.com",
                'role' => Role::ADMIN->value,
                'icon_image_url' => 'https://pbs.twimg.com/profile_images/1759552951054696448/S4d7vej4_400x400.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
