<?php

namespace App\Console\Commands;

use App\Models\OauthClient;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

use function base_path;
use function uuid_create;

final class GenerateOauthClient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:oauth_client';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'クライアントIDとテーブルを作成します';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $env_path = base_path('.env');
        if (! File::exists($env_path)) {
            $this->error('.env ファイルが見つかりません');
        }

        $oauth_client = new OauthClient();
        $oauth_client_data = [
            'client_id' => uuid_create(),
            'client_secret' => Str::random(40),
        ];
        $oauth_client->fill($oauth_client_data)->save();
        $client_id = $oauth_client_data['client_id'];

        $env_content = File::get($env_path);
        $env_add_content = $env_content . "\nCLIENT_ID={$client_id}";

        $this->info("クライアントID: {$client_id}の作成が完了しました");

        File::put($env_path, $env_add_content);
        $this->info('.envファイルにクライアントIDの書き込みが完了しました');
    }
}
