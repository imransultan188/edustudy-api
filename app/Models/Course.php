<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'university_id',
        'level_id',
        'name',
        'slug',
        'overview',
        'duration',
        'class_type',
        'total_fees',
        'currency',
        'english_requirement',
        'offer_letter_free',
        'credit_hours',
        'intakes', // Store as JSON
    ];

    public function yearlyFees() {
        return $this->hasMany(CourseYearlyFee::class);
    }
    
    public function additionalFees() {
        return $this->hasMany(CourseAdditionalFee::class);
    }
    
    public function programStructure() {
        return $this->hasMany(CourseProgramStructure::class);
    }
    
    public function entryRequirements() {
        return $this->hasMany(CourseEntryRequirement::class);
    }
    
    public function careerOpportunities() {
        return $this->hasMany(CourseCareerOpportunity::class);
    }
    
    public function highlights() {
        return $this->hasMany(CourseHighlight::class);
    }
    
    
}
