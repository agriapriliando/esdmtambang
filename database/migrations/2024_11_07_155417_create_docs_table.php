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
        Schema::create('docs', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('company_id')->constrained();
            $table->string('title');
            $table->string('type', 10); //format file
            $table->integer('size')->default(0);
            $table->longText('file_link');
            $table->string('upload_by', 30);
            $table->boolean('visibilitas')->default(0); // default o, akses harus login
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docs');
    }
};
