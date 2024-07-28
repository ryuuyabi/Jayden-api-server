<?php

use App\Enums\RegistrationOperatorApply\RegistrationOperatorApplyStatus;
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
        Schema::create('registration_operator_applies', function (Blueprint $table) {
            $table->id();
            $table->string('email')->comment('メールアドレス');
            $table->string('status')->default(RegistrationOperatorApplyStatus::UNREGISTERED)->comment('ステータス');
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
        Schema::dropIfExists('registration_operator_applies');
    }
};
