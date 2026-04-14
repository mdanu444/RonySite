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
        Schema::create('visas', function (Blueprint $table) {
            $table->id();
            $table->string('visa_number')->unique();
            $table->string('surname')->nullable();
            $table->string('firstname');
            $table->date('date_of_birth');
            $table->string('citizenship');
            $table->string('passport_number');
            $table->string('visa_status');
            $table->date('visa_validity');
            $table->string('visa_type');
            $table->string('visit_purpose');
            $table->string('photo_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visas');
    }
};
