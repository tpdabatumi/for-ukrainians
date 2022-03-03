<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'contact_info',
        'arrive',
        'departure',
        'current_location',
        'passport',
        'passport_arrival',
        'comment'
    ];
}
