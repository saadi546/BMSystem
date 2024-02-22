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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('user_id')->constrained();
            
            $table->string('business_name');
            
            $table->text('description')->nullable();

            $table->string('contact_number')->nullable();

            $table->string('email')->nullable();

            $table->string('website_url')->nullable();

            $table->text('address');

            $table->string('operating_hours')->nullable();

            $table->string('employee_detail')->nullable();

            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
