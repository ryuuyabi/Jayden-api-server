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
        Schema::create('operator_mail_magazines', function (Blueprint $table) {
            $table->unsignedBigInteger('mail_magazine_id')->comment('メールマガジンID');
            $table->unsignedBigInteger('operator_id');
            // 制約
            $table->foreign('mail_magazine_id')->references('id')->on('mail_magazines')->cascadeOnDelete();
            $table->foreign('operator_id')->references('id')->on('operators')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operator_mail_magazines');
    }
};
