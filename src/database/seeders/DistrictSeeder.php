<?php

namespace Database\Seeders;

use App\Enums\IsActive;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * APIで市区町村取得してもよかったが、そうすると仕様上の問題で地区ごとの郷土料理や食材などをすべて登録することになる
 */
class DistrictSeeder extends Seeder
{
    private Builder $db;

    public function __construct()
    {
        $this->db = DB::table('districts');
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 愛知県
        $this->insertAichiPrefectureData();
    }

    private function insertAichiPrefectureData()
    {
        // 名古屋市
        $this->db->insert([
            'prefecture_id' => 24,
            'name' => '名古屋市',
            'origin_name' => '名古屋',
            'code' => '2401',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 一宮市
        $this->db->insert([
            'prefecture_id' => 24,
            'name' => '一宮市',
            'origin_name' => '一宮',
            'code' => '2402',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
