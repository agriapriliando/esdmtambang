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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_company');
            $table->string('name_kontak')->nullable();
            $table->string('kontak', 20)->nullable();
            $table->string('email', 20)->unique()->nullable();
            $table->longText('catatan')->nullable();
            $table->string('company_code')->nullable();
            $table->integer('limit_share')->default(0);
            $table->boolean('password_active')->default(0);
            $table->string('password')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
