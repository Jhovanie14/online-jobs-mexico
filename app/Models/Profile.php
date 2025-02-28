<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    //
    protected $fillable = [
        'job_title',
        'job_description',
        'educational_attainment',
        'job_preference',
        'hour_per_day',
        'hourly_rate',
        'gender',
        'dob',
        'user_id',
    ];

    public function getRouteKeyName()
    {
        return 'user_id';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function skills(): BelongsToMany
    {
        return $this->BelongsToMany(Skill::class, 'profile_skills')->withPivot('rating', 'description')->withTimestamps();
    }
}
