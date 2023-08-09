<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactinfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'content',
        'user_id'
    ];
}
