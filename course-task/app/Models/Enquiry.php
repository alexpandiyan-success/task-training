<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $fillable = [
                           "name",
                           "course_id",
                           "email",
                           "mobile_number",
                           "dob",
                           "passed_out",
                           "studying_year",
                           "district",
                           "ug_degree",
                           "specialization",
                           "college_name",
                           "interested_course",
                           "status",
                           "created_at",
                           "updated_at"
                          ];

    public function courseEnquiry()
      {
        return $this->hasMany(Course::class,'id','course_id');
      }

      public function getUser()
      {
        return $this->hasMany(User::class,'id','user_id');
      }

      public function getPayment()
      {
        return $this->hasMany(Payment::class);
      }
    
    
}
