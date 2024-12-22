<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class author extends Model
{
    use HasFactory;
    protected $table = 'author';
    protected $fillable = ['name','description', 'status', 'image'];

    public function posts()
    {
        return $this->belongsToMany(postModel::class, 'post_author', 'author_id', 'post_id');
    }
    
}
