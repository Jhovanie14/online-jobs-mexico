<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'job_title',
        'employment_type',
        'job_description',
        'salary',
        'desired_hours_per_week'
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
    public function scopeFilter($query, array $filters)
    {
        // Search by job title or description
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('job_title', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('job_description', 'like', '%' . $filters['search'] . '%');
            });
        }

        // Filter by employment types (array input from checkboxes)
        if (!empty($filters['employment_type'])) {
            $query->whereIn('employment_type', $filters['employment_type']);
        }
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'job_post_skills');
    }
    public function listings(): BelongsTo
    {
        return $this->BelongsTo(Employer::class);
    }
}
