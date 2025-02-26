<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Economy extends Model
{
    protected $fillable = [
        'user_id',
        'occupation',
        'average_monthly_income',
        'bpjs',
        'pkh',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
