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
        Schema::create('prefectures', function (Blueprint $table) {
            $table->tinyIncrements('id')->comment('ID');
            $table->string('name', 20)->comment('県名');
            $table->string('origin_name', 20)->comment('県名 都道府県を含まない');
            $table->string('code', 3)->unique()->comment('県コード');
            $table->boolean('is_active')->default(IsActive::OFF)->comment('行動判定');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
            $table->dateTime('deleted_at')->nullable()->comment('削除日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prefectures');
    }
};
