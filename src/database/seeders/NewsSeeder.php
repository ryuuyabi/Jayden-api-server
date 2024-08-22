<?php

namespace Database\Seeders;

use App\Enums\IsActive;
use App\Enums\News\NewsType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $table = DB::table('news');
        $now_carbon = now();
        $table->insert([
            'name' => "jadenのWEBアプリが{$now_carbon->format('Y/m/d')}に公開されました",
            'body' => 'jaydenのwebアプリが公開されました。',
            'news_type' => NewsType::EVERYONE,
            'is_active' => IsActive::ON,
            'release_date' => $now_carbon,
            'created_at' => $now_carbon,
            'updated_at' => $now_carbon,
        ]);
        if (config('app.env') !== 'production') {
            for ($i = 0; $i < 20; $i++) {
                $table->insert([
                    'name' => 'テスト',
                    'body' => 'テスト',
                    'news_type' => NewsType::EVERYONE,
                    'is_active' => IsActive::ON,
                    'operator_id' => 1,
                    'release_date' => $now_carbon,
                    'created_at' => $now_carbon,
                    'updated_at' => $now_carbon,
                ]);
            }
        }
    }
}
