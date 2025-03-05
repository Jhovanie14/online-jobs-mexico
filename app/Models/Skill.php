<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Skill extends Model
{
    use HasFactory;
    //

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function jobseeker() : BelongsToMany
    {
        return $this->BelongsToMany(Jobseeker::class, 'jobseeker_skills')->withPivot('rating', 'description', 'experience')->withTimeStamps();
    }
    public function jobPosts()
    {
        return $this->belongsToMany(JobPost::class, 'job_post_skills');
    }

}
