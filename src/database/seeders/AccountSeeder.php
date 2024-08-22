<?php

namespace Database\Seeders;

use App\Enums\IsActive;
use App\Enums\Operator\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // マスタ権限 本番環境のデータを投入
        DB::table('operators')->insert([
            'id' => 1,
            'sub' => \uuid_create(),
            'personal_name' => '@RUI',
            'nickname' => 'RUI',
            'is_active' => IsActive::ON->value,
            'email' => 'ryuuyapro@gmail.com',
            'role' => Role::MASTER_ADMIN->value,
            'icon_image_url' => 'https://pbs.twimg.com/profile_images/1759552951054696448/S4d7vej4_400x400.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('accounts')->insert([
            'cognito_username' => 'ryuuyapro@gmail.com',
            'cognito_sub' => '6714daf8-f081-7052-35a6-1ee1d5c39409',
            'operator_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
