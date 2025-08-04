<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;

    // app/Models/University.phps

protected $fillable = [
    'name',
    'country_id',
    'city',
    'website',
    'description',
    'logo',
];

public function country()
{
    return $this->belongsTo(Country::class);
}
}
