<?php

namespace Database\Seeders;

use App\Enums\IsActive;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LocalFoodSeeder extends Seeder
{
    private Builder $db;

    public function __construct()
    {
        $this->db = DB::table('local_foods');
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
        $names = ['味噌煮込みうどん', 'ふろふき大根', '十六ささげのごま味噌和え', 'れんこんの煮物', 'きしめん', 'ふきの煮付け', 'たこ飯', '鬼まんじゅう', 'じょじょきり', '酢味噌そうめん', 'へぼ飯', '煮味噌', '串あさり', 'とうがん汁', '五平餅', 'いなりずし', '味噌おでん', '雑煮', 'みそでんがん'];
        foreach ($names as $name) {
            $this->db->insert([
                'prefecture_id' => 24,
                'name' => $name,
                'is_active' => IsActive::ON,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
