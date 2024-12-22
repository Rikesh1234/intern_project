<?php

namespace App\Http\Controllers\backend;

use App\Models\role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny',role::class);
        $role = Role::with('permissions')->paginate(10);
        return view('role.index',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create',role::class);
        $permission = Permission::latest();
        $selectedPermission = old('permission', []);
        return view('role.create',compact('permission','selectedPermission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new role;
        $this->authorize('create',$data);
        $request->validate(['name'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        'slug' => ['required', 'regex:/^[^\s!?\/.*#|-][^\s!?\/.*#|]*[^\s!?\/.*#|-]$/']
    ]);



        $data->name = $request->name;
        $data->slug = $request->slug;
        $data->save();

        $data->permissions()->attach($request->permission);


        return redirect()->route('cms.role')->with('success','Role has been inserted successfully!!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(role $role)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update',role::class);
        $role = role::find($id);
        $permission = Permission::get();
        $selectedPermission = old('permission', []);
        $permissionIds = $role->permissions->pluck('id')->toArray();
        return view('role.edit',compact('role','permission','selectedPermission','permissionIds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update',role::class);
        $role = role::find($id);

        $request->validate(['name'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
        'slug' => ['required', 'regex:/^[^\s!?\/.*#|-][^\s!?\/.*#|]*[^\s!?\/.*#|-]$/']
    ]);

    $role->name = $request->name;
    $role->slug = $request->slug;
    $role->update();

    $role->permissions()->sync($request->permission);

    return redirect()->route('cms.role')->with('success',"Role has been updated successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete',role::class);
        $role = role::find($id);

        if (!$role) {
            return response()->json(['error' => 'Role not found'], 404);
        }

        $role->permissions()->detach();

        $role->users()->detach();

        $role->delete();

        return response()->json(['success' => 'Role deleted successfully']);
    }
}
