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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->comment('名称');
            $table->text('body', 500)->comment('本文');
            $table->boolean('is_active')->comment('行動判定');
            $table->unsignedTinyInteger('news_type')->comment('お知らせ区分');
            $table->unsignedInteger('operator_id')->nullable()->comment('管理者ID');
            $table->dateTime('release_date')->comment('公開日');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->comment('更新日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
