<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    // The fields that are mass assignable
    protected $fillable = [
        'course_id',
        'teacher_id',
        'student_id',
        'day',
        'start_time',
        'end_time',
        'room',
    ];

    /**
     * Relationship: Schedule belongs to a Course
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    /**
     * Relationship: Schedule belongs to a Teacher
     */
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    /**
     * Relationship: Schedule belongs to a Student (nullable)
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
