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
        Schema::create('unauthenticated_users', function (Blueprint $table) {
            $table->uuid('id')->comment('id');
            $table->string('email', 100)->unique()->comment('メールアドレス');
            $table->dateTime('expires_at')->comment('有効期限');
            $table->dateTime('created_at')->comment('作成日');
            $table->dateTime('updated_at')->nullable()->comment('更新日');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unauthenticated_users');
    }
};
