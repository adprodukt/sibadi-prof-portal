<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recording extends Model
{
    protected $fillable = [
        'day_id',
        'educational_institution_id',
        'course_id',
        'name',
        'phone',
        'email',
        'name_institution',
    ];

    
    public function educational_institution() :BelongsTo
    {
        return $this->belongsTo(EducationalInstitution::class);
    }

    
    public function course() :BelongsTo
    {
        return $this->belongsTo(Course::class);
    }
}
