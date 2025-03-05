<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Jobseeker extends Model
{
    use HasUuids;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string'; // UUID is a string

    protected $fillable = [
        'job_title',
        'job_description',
        'educational_attainment',
        'job_preference',
        'hours_per_day',
        'hourly_rate',
        'gender',
        'dob',
        'user_id',
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function skills(): BelongsToMany
    {
        return $this->BelongsToMany(Skill::class, 'jobseeker_skills')->withPivot('rating', 'description', 'experience')->withTimestamps();
    }
}
