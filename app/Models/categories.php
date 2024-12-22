<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['title','slug', 'description', 'status'];

    public function posts()
{
    return $this->belongsToMany(postModel::class,'post_category','category_id','post_id');
}
}
