<?php

use App\Models\Profile;
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
        Schema::create('profile_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Profile::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Skill::class)->constrained()->cascadeOnDelete();
            $table->tinyInteger('rating')->default(0);
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_skills');
    }
};
