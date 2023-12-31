<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'study_id'];

    public function study(){
        return $this->belongsTo(Study::class);
    }

    public function teachers(){
        return $this->hasMany(Subject::class, 'subjects_teachers');
    }
}
