<?php

use App\Enums\IsActive;
use App\Enums\IsNotion;
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
        Schema::create('operators', function (Blueprint $table) {
            $table->id()->comment('ID');
            $table->uuid('sub')->unique()->comment('管理者サブ');
            $table->string('personal_name', 20)->unique()->comment('個人名 @から始まる');
            $table->string('nickname', 30)->nullable()->comment('ニックネーム');
            $table->string('email', 100)->unique()->comment('メールアドレス');
            $table->string('ip_address')->nullable()->comment('IPアドレス');
            $table->unsignedTinyInteger('role')->comment('権限');
            $table->boolean('is_notion')->default(IsNotion::ON)->comment('通知判定');
            $table->boolean('is_active')->default(IsActive::OFF)->comment('行動判定');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->comment('更新日');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
            // 制約
            $table->index('personal_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
