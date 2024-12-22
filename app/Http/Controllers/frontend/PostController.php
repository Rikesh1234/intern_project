<?php

namespace App\Http\Controllers\frontend;

use App\Models\pages;
use App\Models\author;
use App\Models\postModel;
use App\Models\categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;

class PostController extends Controller
{
    public function index($categories_slug){
        $category = categories::where('slug', $categories_slug)
        ->with([
            'posts' => function ($query) {
                $query->where('status', 1)->latest();
            },
            'posts.authors' => function ($query) {
                $query->where('status', 1);
            },
        ])
        ->where('status', 1)
        ->first();

        if($category){
        $posts = $category->posts()->where('status',1)->with('authors')->latest()->paginate(2);
        }else{
        abort(404);
        }
        $categories = categories::where('status', 1)->get();


    $currentIndex = $categories->search(function ($category) use ($categories_slug) {
        return $category->slug == $categories_slug;
    });

        if($currentIndex !== false && $currentIndex < $categories->count() / 2){
            return view('frontend.listing.listing1',compact('category','posts'));
        }else{
            return view('frontend.listing.listing2',compact('category','posts'));
        }
    }

    public function authorList($id){
        $author = author::with('posts')
    ->where('id', $id)
    ->first();

    if($author){

$posts = $author->posts()
    ->where('status', 1)
    ->latest()
    ->paginate(2);
    }else{
        abort(404);
    }


        return view('frontend.listing.listing1',compact('posts','author'));

    }

    public function latest(){
        $posts = postModel::with(['authors','categories'])->latest()->paginate(8);
        return view('frontend.listing.listing1', compact('posts'));
    }


    public function postDesp($id){
        $post = postModel::where('id', $id)->where('status',1)->with(['authors','categories'])->first();

        if($post){
            return view('frontend.description',compact('post'));
        }else{
            abort(404);
        }



    }

    public function pages($page_slug){
        $page = pages::where('page_status',1)->where('page_slug',$page_slug)->first();
        if($page){
        return view('frontend.description',compact('page'));
        }else{
abort(404);
        }
    }


    public function search($search_word){
        $posts = postmodel::where(function($query) use ($search_word){
            $query->where('title', 'like', "%".$search_word."%")
                  ->where('status',1);
        })
        ->orWhereHas('categories',function($query) use ($search_word){
            $query->where('title','like','%'.$search_word."%")
                  ->orWhere('slug','like','%'.$search_word."%")
                  ->where('status',1);
        })
        ->orWhereHas('authors',function($query) use ($search_word){
            $query->where('name','like','%'.$search_word."%")->where('status',1);
        })
        ->paginate(15);

        return view("frontend.listing.search",compact('posts','search_word'));

    }
}
