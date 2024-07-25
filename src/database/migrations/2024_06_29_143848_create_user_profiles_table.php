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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ユーザID');
            $table->string('nickname', 30)->comment('ニックネーム');
            $table->string('sei_name', 30)->nullable()->comment('姓');
            $table->string('mei_name', 30)->nullable()->comment('名');
            $table->string('kana_sei_name', 30)->nullable()->comment('姓 カナ');
            $table->string('kana_mei_name', 30)->nullable()->comment('名 カナ');
            $table->unsignedTinyInteger('prefecture')->comment('県');
            $table->unsignedTinyInteger('district')->nullable()->comment('地区');
            $table->unsignedTinyInteger('occupation')->nullable()->comment('職業');
            $table->string('icon_image_url')->comment('アイコンURL');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
            // 制約
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
