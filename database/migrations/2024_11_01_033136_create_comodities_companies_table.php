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
        Schema::create('comodities_companies', function (Blueprint $table) {
            $table->id();
            $table->integer('comodity_id')->unsigned();
            $table->integer('company_id')->unsigned();
            $table->timestamps();
            $table->foreign('comodity_id')->references('id')->on('comodities')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comodities_companies');
    }
};
