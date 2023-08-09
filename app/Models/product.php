<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name' ,
        'category_id' ,
        'description' ,
        'price' ,
        'waiting_time',
        'image' ,
       'view-count',
   ];
}
