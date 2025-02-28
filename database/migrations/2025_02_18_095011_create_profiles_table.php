<?php

use App\Models\Skill;
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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('job_title')->nullable();
            $table->text('job_description')->nullable();
            $table->string('educational_attainment')->nullable();
            $table->enum('job_preference',['Full Time', 'Part Time', 'Gig'] )->nullable();
            $table->integer('hour_per_day')->nullable();
            $table->decimal('hourly_rate', 8,2)->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); 
            $table->date('dob' )->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('website')->nullable(); 
          


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
