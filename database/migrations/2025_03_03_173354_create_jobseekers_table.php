<?php

use App\Models\User;
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
        Schema::create('jobseekers', function (Blueprint $table) {
           
            $table->uuid('id')->primary();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('full_name')->nullable();
            $table->string('job_title');
            $table->text('job_description')->nullable();
            $table->string('educational_attainment');
            $table->enum('job_preference',['Full Time', 'Part Time', 'Gig'] );
            $table->integer('hours_per_day')->nullable();
            $table->decimal('hourly_rate', 8,2)->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); 
            $table->date('dob' )->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseekers');
    }
};
