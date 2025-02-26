<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        'user_id',
        'spouse_name',
        'number_of_sons',
        'number_of_daughters',
        'house_status',
        'number_of_siblings',
    ];
}
