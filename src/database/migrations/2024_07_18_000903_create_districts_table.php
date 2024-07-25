<?php

use App\Enums\IsActive;
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
        Schema::create('districts', function (Blueprint $table) {
            $table->id();
            $table->unsignedTinyInteger('prefecture_id')->comment('県ID');
            $table->string('name', 20)->comment('地区名');
            $table->string('origin_name', 20)->comment('地区名 市区町村を含まない');
            $table->string('code', 6)->unique()->comment('地区コード');
            $table->boolean('is_active')->default(IsActive::OFF)->comment('行動判定');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
            // 制約
            $table->foreign('prefecture_id')->references('id')->on('prefectures')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('districts');
    }
};
