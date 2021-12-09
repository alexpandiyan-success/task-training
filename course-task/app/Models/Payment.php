<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        "enquiry_id",
        "payment_method",
        "payment_mode",
        "reference_number",
        "amount",
        "txn_number",
       ];

       public function enquiry()
      {
        return $this->hasOne(Enquiry::class,'id','enquiry_id');
      }
    
}
