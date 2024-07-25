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
        Schema::create('news_reads', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->comment('ユーザID');
            $table->unsignedInteger('news_id')->comment('ニュースID');
            // 制約
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->foreign('news_id')->references('id')->on('news')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news_reads');
    }
};
