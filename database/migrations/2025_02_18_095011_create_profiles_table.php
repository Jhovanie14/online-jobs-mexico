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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(User::class);
            $table->text('bio')->nullable();
            $table->string('location')->nullable();
            $table->text('skills')->nullable();
            $table->text('job_preference')->nullable();
            $table->decimal('hourly_rate', 8,2)->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('website')->nullable();
            $table->integer('age')->nullable(); 
            $table->enum('sex', ['male', 'female', 'other'])->nullable(); 
            $table->string('degree')->nullable(); 


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
