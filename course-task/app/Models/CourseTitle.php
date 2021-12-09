<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTitle extends Model
{
    use HasFactory;

    protected $fillable = ["title","course_id","created_at","updated_at"];

    public function course()
    {
        return $this->hasOne(Course::class);
    }
    public function courseTitleDetails()
    {
        return $this->hasMany(CourseTitleDetail::class);
    }
}
