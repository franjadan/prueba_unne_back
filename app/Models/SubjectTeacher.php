<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubjectTeacher extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id', 'teacher_id'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
