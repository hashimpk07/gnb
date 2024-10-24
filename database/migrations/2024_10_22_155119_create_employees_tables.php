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
        Schema::create('employees_1', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('job_title');
            $table->string('email');
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            $table->string('location');
            $table->enum('status', ['active', 'inactive']);
            $table->tinyInteger('performance_rating');
            $table->timestamps();
        });
    
        Schema::create('employees_2', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('job_title');
            $table->string('email');
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            $table->string('location');
            $table->enum('status', ['active', 'inactive']);
            $table->tinyInteger('performance_rating');
            $table->timestamps();
        });
    
        Schema::create('employees_3', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('department');
            $table->string('job_title');
            $table->string('email');
            $table->date('hire_date');
            $table->decimal('salary', 10, 2);
            $table->string('location');
            $table->enum('status', ['active', 'inactive']);
            $table->tinyInteger('performance_rating');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees_1');
        Schema::dropIfExists('employees_2');
        Schema::dropIfExists('employees_3');
    }
};
