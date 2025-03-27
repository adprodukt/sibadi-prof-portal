<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Day extends Model
{
    protected $fillable = [
        'status',
        'title',
        'time',
        'date',
        'address',
        'description',
        'direction_id',
    ];

    public function getTitle() :string{
        $title = "День открытых дверей";
        if($this->direction_id)
            $title .= " для Направления: {$this->direction->direction}";
        return $this->title ?? $title;
    }

    public function direction() :BelongsTo
    {
        return $this->belongsTo(Direction::class);
    }
}
