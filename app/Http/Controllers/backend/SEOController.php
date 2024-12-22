<?php

namespace App\Http\Controllers\backend;

use App\Models\SEO;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',SEO::class);
        $fieldData = SEO::all();
        return view('SEO.index',compact('fieldData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',SEO::class);
        $fieldData = SEO::all();
        $nextIncrement = DB::table('field')->select(DB::raw('AUTO_INCREMENT'))->from('information_schema.TABLES')->where('TABLE_SCHEMA', config('database.connections.mysql.database'))->where('TABLE_NAME', 'field')->get()[0]->AUTO_INCREMENT;
        return view('SEO.create',compact('fieldData','nextIncrement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new SEO;
        $this->authorize('create',$data);
        $validator = Validator::make($request->all(), [
            'Field_Type' => 'required',
            'Label_Name' => 'required',
            'Field_Name' => ['required', 'unique:field,field_name','regex:/^[^-_].*[^-_]$/'],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try{
        $data->field_type = $request->Field_Type;
        $data->label_name = $request->Label_Name;
        $data->field_name = Str::snake($request->Field_Name);
        $data->field_data = null;
        $data->save();
        return response()->json(['message' => 'Field inserted successfully']);
        }catch (QueryException $exception) {
            if ($exception->errorInfo[1] === 1062) { // Check for duplicate entry error
                return response()->json(['error' => 'Duplicate entry.'], 409);
            }

            // Handle other exceptions if needed
            return response()->json(['error' => 'Internal Server Error.'], 500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SEO  $sEO
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('create',SEO::class);
        $data = SEO::find($id);

        $validator = Validator::make($request->all(), [
            'Field_Type' => 'required',
            'Label_Name' => 'required',
            'Field_Name' => ['required', 'regex:/^[^-_].*[^-_]$/'],
        ]);


        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }


        $data->update([
            'field_name' => Str::snake($request->input('Field_Name'))   ,
            'field_type' => $request->input('Field_Type'),
            'label_name' => $request->input('Label_Name'),
        ]);
        if($request->input('data') != null){
            $data->update([
            'field_data' => null,
        ]);
        }
        return response()->json(['success' => 'Page updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SEO  $sEO
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',SEO::class);
        $seo = SEO::find($id);

        if (!$seo) {
            return response()->json(['error' => 'Field not found'], 404);
        }

        $seo->delete();

        return response()->json(['success' => 'Field deleted successfully']);
    }

    public function updateData(Request $request, $id) {
        $this->authorize('create',SEO::class);
        try {
            $seoData = SEO::find($id);

            $requestData = $request->json()->all();
            $data = $requestData['data'];


            if ($seoData) {
                // Update the 'field_data' column with the value from the request
                $seoData->update(['field_data' => $data]);

                return response()->json(['success' => 'Data updated successfully']);
            } else {
                return response()->json(['error' => 'Post not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update data'], 500);
        }
    }
}
