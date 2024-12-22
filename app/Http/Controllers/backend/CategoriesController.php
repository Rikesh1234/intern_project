<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',categories::class);
        $categories = categories::latest()->paginate(8);
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',categories::class);
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new categories;
        $this->authorize('viewAny',$data);
        $request->validate([
            'title' => 'required',
            'slug' => ['required', 'regex:/^[^\s!?\/.*#|-][^\s!?\/.*#|]*[^\s!?\/.*#|-]$/']
        ]);


    $data->title = $request->title;
    $data->slug = $request->slug;
    $data->description = $request->description;
    $data->status = $request->has('status') ? 1 : 0;
    $data->save();
    return redirect()->route('cms.categories')->with('success','Categories has been inserted successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show(categories $categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(categories $categories)
    {
        $this->authorize('update',categories::class);
        return view('categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update',categories::class);

        $categories = categories::find($id);

        $request->validate([
            'title' => 'required',
            'slug' => ['required', 'regex:/^[^\s!?\/.*#|-][^\s!?\/.*#|]*[^\s!?\/.*#|-]$/']
        ]);


        $categories->title = $request->title;
        $categories->slug = $request->slug;
        $categories->description=$request->description;
        $categories->status = $request->has('status') ? 1 : 0;
        $categories->update();
        return redirect()->route('cms.categories')->with('success',"Categories has been updated successfully!!!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',categories::class);
        try{
        $categories = categories::find($id);

        if (!$categories) {
            return response()->json(['error' => 'Categories not found'], 404);
        }

        if ($categories->posts->count() > 0) {
            return response()->json(['error' => 'This categories is linked with post, so deletion is not successful'], 404);
        }

        $categories->delete();

        return response()->json(['success' => 'Categories deleted successfully']);
        }catch(Exception $e){
            return response()->json(['error' => 'This categories is linked with post, so deletion is not successful'], 404);
        }
    }

    public function updateStatus($id, $status)
    {
        $this->authorize('update',categories::class);

        try {
            $categories = categories::find($id);
            if ($categories) {
                $categories->update(['status' => $status]);
                return response()->json(['success' => 'Status updated successfully']);
            } else {
                return response()->json(['error' => 'Post not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }
}
