<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseYearlyFee extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_id',
        'year',
        'amount',
    ];
    
}
