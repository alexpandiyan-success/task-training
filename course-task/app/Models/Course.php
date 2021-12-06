<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ["name","price","short_description","detailed_description","image","video_url","created_at","updated_at"];

   public function courseLearnings()
    {
        return $this->hasMany(CourseLearning::class);
    }
}
