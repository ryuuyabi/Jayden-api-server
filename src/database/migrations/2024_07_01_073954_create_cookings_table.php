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
        Schema::create('cookings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50)->comment('名前');
            $table->text('description')->comment('説明');
            $table->unsignedTinyInteger('type')->comment('料理区分');
            $table->unsignedTinyInteger('prefecture')->nullable()->comment('県');
            $table->unsignedBigInteger('user_id')->nullable()->comment('ユーザID');
            $table->unsignedBigInteger('operator_id')->nullable()->comment('管理者ID');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
            // 制約
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreign('operator_id')->references('id')->on('operators')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cookings');
    }
};
