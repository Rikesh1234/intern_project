<?php

namespace App\Http\Controllers\backend;

use App\Models\pages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Contracts\Pagination\Paginator;


class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    $this->authorize('viewAny',pages::class);
    $pages = pages::latest()->paginate(8);
    $tableLength = $pages->total();
    return view('pages.index', compact('pages','tableLength'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    $data = new pages;
    $this->authorize('create',$data);
    $validator = Validator::make($request->all(), [
        'title' => 'required',
        'slug' => ['required', 'regex:/^[^\s!?\/.*#|-][^\s!?\/.*#|]*[^\s!?\/.*#|-]$/'],
        'summary' => 'nullable',
        'description' => 'nullable',
        'status' => 'nullable',
    ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 422);
    }


    $data->page_title = $request->title;
    $data->page_slug = $request->slug;
    $data->page_status = $request->status ? 1 : 0;
    $data->page_summary = $request->summary;
    $data->page_description = $request->description;
    $data->save();

    return response()->json(['success' => 'Data inserted successfully']);
}

public function getLatestData()
{
    try {
        $latestData = Pages::latest()->paginate(8);
        $tableLength = $latestData->total();

        return response()->json(['latestData' => $latestData, 'tableLength' => $tableLength]);
    } catch (\Exception $e) {
        return response()->json(['error' => 'Internal Server Error'], 500);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function show(pages $pages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function edit($pageId)
    {
        $this->authorize('update',pages::class);
        $page = pages::find($pageId);

        if (!$page) {
            return response()->json(['error' => 'Page not found'], 404);
        }

        $responseData = [
            'id'          => $page->id,
            'title'       => $page->page_title,
            'slug'        => $page->page_slug,
            'summary'     => $page->page_summary,
            'description' => $page->page_description,
            'status'      => $page->page_status,
        ];

        return response()->json($responseData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pageId)
    {
        $this->authorize('update',pages::class);
        $page = pages::find($pageId);


        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'slug' => ['required', 'regex:/^[^\s!?\/.*#|-][^\s!?\/.*#|]*[^\s!?\/.*#|-]$/'],
            'summary' => 'nullable',
            'description' => 'nullable',
            'status' => 'nullable',
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $page->update([
            'page_title' => $request->input('title'),
            'page_slug' => $request->input('slug'),
            'page_summary' => $request->input('summary'),
            'page_description' => $request->input('description'),
            'page_status' => $request->input('status') ? 1 : 0,
        ]);
        return response()->json(['success' => 'Page updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pages  $pages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',pages::class);
        $page = pages::find($id);

        if (!$page) {
            return response()->json(['error' => 'Page not found'], 404);
        }

        $page->delete();

        return response()->json(['success' => 'Page deleted successfully']);
    }

    public function updateStatus($id, $status)
    {
        $this->authorize('update',pages::class);

        try {
            $page = pages::find($id);
            if ($page) {
                $page->update(['page_status' => $status]);
                return response()->json(['success' => 'Status updated successfully']);
            } else {
                return response()->json(['error' => 'Post not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }
}
