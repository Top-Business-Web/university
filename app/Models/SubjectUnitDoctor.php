<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubjectUnitDoctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'user_id',
        'group_id',
        'subject_id',
        'period',
    ];

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->where('user_type', 'doctor');
    }


    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }


    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }

    public function subjectDoc(): HasMany
    {
        return $this->hasMany(SubjectExamStudentResult::class,'subject_id','subject_id');
    }


}
