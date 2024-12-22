<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pages extends Model
{
    use HasFactory;

    protected $table = 'pages';
    protected $fillable = ['page_title','page_slug','page_status','page_summary','page_description'];
}
