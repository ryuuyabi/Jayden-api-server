<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_tokens', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->comment('ユーザID');
            $table->string('access_token', 100)->comment('アクセストークン');
            $table->string('access_token_expires_at')->comment('アクセストークン有効期限');
            $table->string('refresh_token', 100)->nullable()->comment('リフレッシュトークン');
            $table->string('refresh_token_expires_at', 100)->nullable()->comment('リフレッシュトークン有効期限');
            // 制約
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tokens');
    }
};
