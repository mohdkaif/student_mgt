<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentMarksheet extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $casts = [
        'subject_marks' => 'array',
    ];
   
    public function student_data()
    {
        return $this->belongsTo(Student::class, "student_id", "id");
    }
}
