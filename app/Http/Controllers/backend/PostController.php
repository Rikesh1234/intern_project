<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\postModel;
use App\Models\author;
use App\Models\categories;


class PostController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',postModel::class);
        $posts = postModel::latest()->paginate(8);
        return view('post.posts',compact('posts'));
    }

    public function create(){
        $this->authorize('create',postModel::class);
        $author = author::where('status',1)->get();
        $categories = categories::where('status',1)->get();
        $selectedAuthors = old('author', []);
        $selectedCategories = old('categories', []);
        return view('post.postsAdd',compact('author','categories','selectedAuthors','selectedCategories'));
    }

    public function store(Request $request){
        $data = new postModel;
        $this->authorize('create',$data);
        $request->validate(['title'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        'author' => 'required',
        'categories' => 'required'
    ]);



        $imageName = '';
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/posts'),$imageName);
        }



        $data->title = $request->title;
        $data->description = $request->description;
        $data->summary = $request->summary;
        $data->status = $request->has('status') ? 1 : 0;
        $data->image = $imageName;
        $data->save();

            $data->authors()->sync($request->author);

            $data->categories()->sync($request->categories);


        return redirect()->route('cms.post')->with('success','Post has been inserted successfully!!!');
    }

    public function edit($id)
    {
        $this->authorize('update',postModel::class);
        $post = postModel::find($id);
        $author = author::where('status', 1)->get();
        $categories = categories::where('status', 1)->get();
        $authorIds = $post->authors->pluck('id')->toArray();
        $catId = $post->categories->pluck('id')->toArray();
        $selectedAuthors = old('author', []);
        $selectedCategories = old('categories', []);
        return view('post.postEdit', compact('post', 'author', 'categories', 'authorIds','catId','selectedAuthors','selectedCategories'));
    }

    public function update(Request $request,$id){
        $this->authorize('update',postModel::class);
        $post = postModel::find($id);

        $request->validate(['title'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        'author' => 'required',
        'categories' => 'required'
    ]);

        $imageName = '';
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/posts'),$imageName);
            $post->image = $imageName;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->summary = $request->summary;
        $post->status = $request->has('status') ? 1 : 0;
        $post->update();

        $post->authors()->sync($request->author);

        $post->categories()->sync($request->categories);

        return redirect()->route('cms.post')->with('success',"Post has been updated successfully!!!");

    }

    public function destroy($id) {
        $this->authorize('delete',postModel::class);
        $post = postModel::find($id);

        if (!$post) {
            return response()->json(['error' => 'Post not found'], 404);
        }

        $post->delete();

        return response()->json(['success' => 'Post deleted successfully']);
    }

    public function updateStatus($id, $status)
{
    $this->authorize('update',postModel::class);
    try {
        $post = postModel::find($id);
        if ($post) {
            $post->update(['status' => $status]);
            return response()->json(['success' => 'Status updated successfully']);
        } else {
            return response()->json(['error' => 'Post not found'], 404);
        }
    } catch (Exception $e) {
        return response()->json(['error' => 'Failed to update status'], 500);
    }
}
}
