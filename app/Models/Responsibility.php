<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Responsibility extends Model
{
    protected $fillable = [
        'user_id',
        'upa_supervisor',
        'cadre_structure',
        'party_structure',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
