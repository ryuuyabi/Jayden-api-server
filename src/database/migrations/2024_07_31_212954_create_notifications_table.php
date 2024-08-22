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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('名称');
            $table->unsignedTinyInteger('notification_type')->comment('通知区分');
            $table->unsignedTinyInteger('notification_account_type')->comment('通知アカウント区分');
            $table->unsignedBigInteger('user_id')->nullable()->comment('ユーザID');
            $table->unsignedBigInteger('operator_id')->nullable()->comment('管理者ID');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->comment('更新日');
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
        Schema::dropIfExists('notifications');
    }
};
