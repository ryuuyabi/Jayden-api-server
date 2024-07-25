<?php

namespace Database\Seeders;

use App\Enums\IsActive;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $model = DB::table('prefectures');

        // 北海道
        $model->insert([
            'name' => '北海道',
            'origin_name' => '北海道',
            'code' => '001',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 青森県
        $model->insert([
            'name' => '青森県',
            'origin_name' => '青森',
            'code' => '002',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 岩手県
        $model->insert([
            'name' => '岩手県',
            'origin_name' => '岩手',
            'code' => '003',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 宮城県
        $model->insert([
            'name' => '宮城県',
            'origin_name' => '宮城',
            'code' => '004',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 秋田県
        $model->insert([
            'name' => '秋田県',
            'origin_name' => '秋田',
            'code' => '005',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 山形県
        $model->insert([
            'name' => '山形県',
            'origin_name' => '山形',
            'code' => '006',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 福島県
        $model->insert([
            'name' => '福島県',
            'origin_name' => '福島',
            'code' => '007',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 茨城県
        $model->insert([
            'name' => '茨城県',
            'origin_name' => '茨城',
            'code' => '008',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 栃木県
        $model->insert([
            'name' => '栃木県',
            'origin_name' => '栃木',
            'code' => '009',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 群馬県
        $model->insert([
            'name' => '群馬県',
            'origin_name' => '群馬',
            'code' => '010',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 埼玉県
        $model->insert([
            'name' => '埼玉県',
            'origin_name' => '埼玉',
            'code' => '011',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 千葉県
        $model->insert([
            'name' => '千葉県',
            'origin_name' => '千葉',
            'code' => '012',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 東京都
        $model->insert([
            'name' => '東京都',
            'origin_name' => '東京',
            'code' => '013',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 香川県
        $model->insert([
            'name' => '香川県',
            'origin_name' => '香川',
            'code' => '014',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 新潟県
        $model->insert([
            'name' => '新潟県',
            'origin_name' => '新潟',
            'code' => '015',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 富山県
        $model->insert([
            'name' => '富山県',
            'origin_name' => '富山',
            'code' => '016',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 石川県
        $model->insert([
            'name' => '石川県',
            'origin_name' => '石川',
            'code' => '017',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 福井県
        $model->insert([
            'name' => '福井県',
            'origin_name' => '福井',
            'code' => '018',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 山梨県
        $model->insert([
            'name' => '山梨県',
            'origin_name' => '山梨',
            'code' => '019',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 長野県
        $model->insert([
            'name' => '長野',
            'origin_name' => '長野',
            'code' => '020',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 岐阜県
        $model->insert([
            'name' => '岐阜県',
            'origin_name' => '岐阜',
            'code' => '021',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 静岡県
        $model->insert([
            'name' => '静岡県',
            'origin_name' => '静岡',
            'code' => '022',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 愛知県
        $model->insert([
            'name' => '愛知県',
            'origin_name' => '愛知',
            'code' => '023',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 三重県
        $model->insert([
            'name' => '三重県',
            'origin_name' => '三重',
            'code' => '024',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 滋賀県
        $model->insert([
            'name' => '滋賀県',
            'origin_name' => '滋賀',
            'code' => '025',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 京都府
        $model->insert([
            'name' => '京都府',
            'origin_name' => '京都',
            'code' => '026',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 大阪府
        $model->insert([
            'name' => '大阪府',
            'origin_name' => '大阪',
            'code' => '027',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 兵庫県
        $model->insert([
            'name' => '兵庫県',
            'origin_name' => '兵庫',
            'code' => '028',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 奈良県
        $model->insert([
            'name' => '奈良県',
            'origin_name' => '奈良',
            'code' => '029',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 和歌山県
        $model->insert([
            'name' => '和歌山県',
            'origin_name' => '和歌山',
            'code' => '030',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 鳥取県
        $model->insert([
            'name' => '鳥取県',
            'origin_name' => '鳥取',
            'code' => '031',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 島根県
        $model->insert([
            'name' => '島根県',
            'origin_name' => '島根',
            'code' => '032',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 岡山県
        $model->insert([
            'name' => '岡山県',
            'origin_name' => '岡山',
            'code' => '033',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 広島県
        $model->insert([
            'name' => '広島県',
            'origin_name' => '広島',
            'code' => '034',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 山口県
        $model->insert([
            'name' => '山口県',
            'origin_name' => '山口',
            'code' => '035',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 徳島県
        $model->insert([
            'name' => '徳島県',
            'origin_name' => '徳島',
            'code' => '036',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 香川県
        $model->insert([
            'name' => '香川県',
            'origin_name' => '香川',
            'code' => '037',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 愛媛県
        $model->insert([
            'name' => '愛媛県',
            'origin_name' => '愛媛',
            'code' => '038',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 高知県
        $model->insert([
            'name' => '高知県',
            'origin_name' => '高知',
            'code' => '039',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 福岡県
        $model->insert([
            'name' => '福岡県',
            'origin_name' => '福岡',
            'code' => '040',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 佐賀県
        $model->insert([
            'name' => '佐賀県',
            'origin_name' => '佐賀',
            'code' => '041',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 長崎県
        $model->insert([
            'name' => '長崎県',
            'origin_name' => '長崎',
            'code' => '042',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 熊本県
        $model->insert([
            'name' => '熊本県',
            'origin_name' => '熊本',
            'code' => '043',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 大分県
        $model->insert([
            'name' => '大分県',
            'origin_name' => '大分',
            'code' => '044',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 宮崎県
        $model->insert([
            'name' => '宮崎県',
            'origin_name' => '宮崎',
            'code' => '045',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 鹿児島県
        $model->insert([
            'name' => '鹿児島県',
            'origin_name' => '鹿児島',
            'code' => '046',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // 沖縄県
        $model->insert([
            'name' => '沖縄県',
            'origin_name' => '沖縄',
            'code' => '047',
            'is_active' => IsActive::ON,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
