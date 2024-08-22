<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * データベースに対するデータ設定の実行
     */
    public function run(): void
    {
        $this->call([
            AccountSeeder::class,
            OperatorSeeder::class,
            UserSeeder::class,
            IdentifierSeeder::class,
            PrefectureSeeder::class,
            DistrictSeeder::class,
            LocalFoodSeeder::class,
            NewsSeeder::class,
        ]);
    }
}
