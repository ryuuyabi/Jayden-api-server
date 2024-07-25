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
        Schema::create('operator_tokens', function (Blueprint $table) {
            $table->unsignedBigInteger('operator_id');
            $table->string('access_token')->comment('アクセストークン');
            $table->string('refresh_token')->nullable()->comment('リフレッシュトークン');;
            $table->string('expired_at');
            // 制約
            $table->foreign('operator_id')->references('id')->on('operators')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator_tokens');
    }
};
