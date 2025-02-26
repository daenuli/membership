<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Member extends Model
{
    protected $fillable = [
        'user_id',
        'full_name',
        'nick_name',
        'birth_place',
        'birth_date',
        'gender',
        'blood_type',
        'height',
        'weight',
        'marital_status',
        'street',
        'rt_rw',
        'neighborhood',
        'subdistrict_id',
        'village',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function subdistrict(): BelongsTo
    {
        return $this->belongsTo(Subdistrict::class);
    }

    public function family(): HasOne
    {
        return $this->hasOne(Family::class, 'user_id', 'user_id');
    }

    public function educations(): HasMany
    {
        return $this->hasMany(EducationHistory::class, 'user_id', 'user_id');
    }

    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class, 'user_id', 'user_id');
    }

    public function economy(): HasOne
    {
        return $this->hasOne(Economy::class, 'user_id', 'user_id');
    }

    public function guidancehistories(): HasOne
    {
        return $this->hasOne(GuidanceHistory::class, 'user_id', 'user_id');
    }

    public function responsibilities(): HasOne
    {
        return $this->hasOne(Responsibility::class, 'user_id', 'user_id');
    }
}
