<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employer extends Model
{
    protected $fillable =
    [
        'full_name'
    ];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function listings() : HasMany
    {
        return $this->hasMany(JobPost::class);
    }
}
