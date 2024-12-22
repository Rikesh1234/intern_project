<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',author::class);
        $author = author::latest()->paginate(8);
        return view('author.index',compact('author'))->with('i',(request()->input('page',1)-1)*4);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',author::class);
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new author;
        $this->authorize('create',$data);
        $request->validate(['name'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048'
    ]);

    $imageName = '';
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/authors'),$imageName);
        }


        $data->name = $request->name;
        $data->description = $request->description;
        $data->status = $request->has('status') ? 1 : 0;
        $data->image = $imageName;
        $data->save();
        return redirect()->route('cms.author')->with('success','Author has been inserted successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(author $author)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(author $author)
    {
        $this->authorize('update',author::class);
        return view('author.edit',compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $this->authorize('create',author::class);
        $author = author::find($id);

        $request->validate(['name'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048'
    ]);

    $imageName = '';
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/authors'),$imageName);
            $author->image = $imageName;
        }

        $author->name = $request->name;
        $author->description = $request->description;
        $author->status = $request->has('status') ? 1 : 0;
        $author->update();
        return redirect()->route('cms.author')->with('success',"Author has been updated successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',author::class);
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        if ($author->posts()->count() > 0) {
            return response()->json(['error' => 'This author is linked with posts, so deletion is not successful'], 404);
        }

        $author->delete();

        return response()->json(['success' => 'Author deleted successfully']);
    }
    public function updateStatus($id, $status)
    {
        $this->authorize('update',author::class);

        try {
            $author = author::find($id);
            if ($author) {
                $author->update(['status' => $status]);
                return response()->json(['success' => 'Status updated successfully']);
            } else {
                return response()->json(['error' => 'Post not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }
}
