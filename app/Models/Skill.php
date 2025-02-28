<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function profiles() : BelongsToMany
    {
        return $this->belongsToMany(Profile::class, 'profile_skills')->withPivot('rating','description')->withTimestamps();
    }
}
