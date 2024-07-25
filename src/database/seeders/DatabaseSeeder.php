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
            IdentifierSeeder::class,
            PrefectureSeeder::class,
            DistrictSeeder::class,
            LocalFoodSeeder::class,
        ]);
    }
}
