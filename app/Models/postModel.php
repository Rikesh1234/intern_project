<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use App\Models\author;
    use App\Models\categories;

    class postModel extends Model
    {
        use HasFactory;

        protected $table = 'posts';

        protected $fillable = ['title','description','summary','status','image'];

        public function categories()
    {
        return $this->belongsToMany(categories::class,'post_category','post_id','category_id');
    }

    public function authors()
    {
        return $this->belongsToMany(author::class, 'post_author', 'post_id', 'author_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($post) {
            // Detach categories related to the post
            $post->categories()->detach();
        });
    }
    }
