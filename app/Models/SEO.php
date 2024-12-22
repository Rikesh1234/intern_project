<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{
    use HasFactory;
    protected $table = 'field';
    protected $fillable = ['field_type','label_name','field_name','field_data'];
}
