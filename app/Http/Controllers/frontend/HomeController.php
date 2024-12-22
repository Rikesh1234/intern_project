<?php

namespace App\Http\Controllers\frontend;

use App\Models\categories;
use App\Models\postModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){

        $postss = postModel::where('status',1)->with('authors')->latest()->get();

        $category = Categories::where('slug', 'politics')->where('status',1)->first();
        if ($category) {
            $post = $category->posts()->where('status', 1)->latest()->get();
            if ($post) {
                $authors = [];
                foreach ($post as $posts) {
                    $authors[] = $posts->authors()->get();
                }
                $politicsSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [$post],
                    'authors' => [$authors]
                ];
            } else {
                // Handle case where no posts were found
                $politicsSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [],
                    'authors' => []
                ];
            }
        } else {
            $politicsSection = null;
        }

        $category = Categories::where('slug', 'society')->where('status',1)->first();
        if ($category) {
            $post = $category->posts()->where('status', 1)->latest()->get();
            if ($post) {
                $authors = [];
                $societySection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [$post],
                    'authors' => [$authors]
                ];
            } else {
                $societySection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [],
                    'authors' => []
                ];
            }
        } else {
            $societySection = null;
        }

        $category = Categories::where('slug', 'business')->where('status',1)->first();
        if ($category) {
            $post = $category->posts()->where('status', 1)->latest()->get();
            if ($post) {
                $authors = [];
                foreach ($post as $posts) {
                    $authors[] = $posts->authors()->get();
                }
                $businessSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [$post],
                    'authors' => [$authors]
                ];
            } else {
                $businessSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [],
                    'authors' => []
                ];
            }
        } else {
            $businessSection = null;
        }

        $category = Categories::where('slug', 'entertainment')->where('status',1)->first();
        if ($category) {
            $post = $category->posts()->where('status', 1)->latest()->get();
            if ($post) {
                $authors = [];
                foreach ($post as $posts) {
                    $authors[] = $posts->authors()->get();
                }
                $entertainmentSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [$post],
                    'authors' => [$authors]
                ];
            } else {
                $entertainmentSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [],
                    'authors' => []
                ];
            }
        } else {
            $entertainmentSection = null;
        }

        $category = Categories::where('slug', 'fashoin')->where('status',1)->first();
        if ($category) {
            $post = $category->posts()->where('status', 1)->latest()->get();
            if ($post) {
                $authors = [];
                foreach ($post as $posts) {
                    $authors[] = $posts->authors()->get();
                }
                $fashoinSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [$post],
                    'authors' => [$authors]
                ];
            } else {
                $fashoinSection = [
                    'category' => [
                        'id' => $category->id,
                        'name' => $category->title,
                        'slug' => $category->slug
                    ],
                    'posts' => [],
                    'authors' => []
                ];
            }
        } else {
            $fashoinSection = null;
        }



        return view('frontend.home',compact('politicsSection','societySection','businessSection','entertainmentSection','fashoinSection','postss'));
    }
}
