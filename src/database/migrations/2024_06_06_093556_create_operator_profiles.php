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
        Schema::create('operator_profiles', function (Blueprint $table) {
            $table->unsignedBigInteger('operator_id')->comment('管理者ID');
            $table->string('first_name', 30)->comment('性');
            $table->string('last_name', 30)->comment('名');
            $table->unsignedTinyInteger('gender')->comment('性別');
            $table->string('address1')->unique()->comment('住所: 県市町村');
            $table->string('address2')->unique()->comment('住所: 番地建物');
            $table->string('zip1')->unique()->comment('郵便番号1');
            $table->string('zip2')->unique()->comment('郵便番号2');
            $table->string('tel')->unique()->comment('電話番号');
            // その他
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->comment('更新日');
            // 制約
            $table->foreign('operator_id')->references('id')->on('operators')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator_profiles');
    }
};
