<?php

use App\Models\Jobseeker;
use App\Models\Skill;
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
        Schema::create('jobseeker_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Jobseeker::class);
            $table->foreignIdFor(Skill::class);
            $table->tinyInteger('rating')->default(0);
            $table->text('description')->nullable();
            $table->text('experience')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobseeker_skills');
    }
};
