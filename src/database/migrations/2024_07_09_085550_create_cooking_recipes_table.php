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
        Schema::create('cooking_recipes', function (Blueprint $table) {
            $table->unsignedBigInteger('cooking_id')->comment('料理ID');
            $table->string('sub_title', 100)->comment('サブタイトル');
            $table->text('body')->comment('本文');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cooking_recipes');
    }
};
