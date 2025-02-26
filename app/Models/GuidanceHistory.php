<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GuidanceHistory extends Model
{
    protected $fillable = [
        'user_id',
        'start_date',
        'membership_level',
        'last_promotion_date',
        'upa_mentor',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
