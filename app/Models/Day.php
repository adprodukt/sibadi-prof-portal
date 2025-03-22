<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Day extends Model
{
    protected $fillable = [
        'title',
        'time',
        'date',
        'address',
        'description',
        'direction_id',
    ];

    public function direction() :BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }
}
