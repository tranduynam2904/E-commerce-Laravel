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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('avatar', 255)->nullable();
            $table->string('name', 255);
            $table->string('slug', 255)->nullable();
            $table->string('email', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedInteger('age');
            $table->string('gender', 255);
            $table->unsignedBigInteger('phone');
            $table->unsignedBigInteger('job_categories_id');
            $table->text('description');
            $table->foreign('job_categories_id')->references('id')->on('job_categories');
            // $table->string('password', 255);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
