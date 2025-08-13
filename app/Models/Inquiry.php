<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'phone_whatsapp',
        'email',
        'nationality',
        'program_level',
        'background'
    ];
}
