<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny',User::class);
        $currentUserId = Auth::id();

        $user = User::where('id', '!=', $currentUserId)->paginate(8);

        return view('user.index', compact('user'));
    }

    public function create()
    {
        $this->authorize('create',User::class);
        $role = role::latest();
        $selectedRole = old('role', []);
        return view('user.create',compact('role','selectedRole'));
    }

    public function store(Request $request)
    {
        $data = new User;
        $this->authorize('create',$data);
        $rules = [
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirm_password:confirm-password',
        ];

        $messages = [
            'confirm_password' => 'The :attribute confirmation does not match.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {
            return redirect()
                ->route('cms.user.create')
                ->withErrors($validator)
                ->withInput();
        }

    $imageName = '';
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/users'),$imageName);
        }


        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->status = $request->has('status') ? 1 : 0;
        $data->image = $imageName;
        $data->save();

        $data->roles()->attach($request->role);
        return redirect()->route('cms.user')->with('success','User has been inserted successfully!!!');
    }

    public function edit($id)
    {
        $this->authorize('update',User::class);
        $user = User::find($id);
        $role = role::get();
        $selectedRole = old('role', []);
        $roleIds = $user->roles->pluck('id')->toArray();
        return view('user.edit',compact('user','role','selectedRole','roleIds'));
    }

    public function update(Request $request, $id)
    {
        $this->authorize('update',User::class);
        $user = User::find($id);

        $rules = [
            'image' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirm_password:confirm-password',
        ];

        $messages = [
            'confirm_password' => 'The :attribute confirmation does not match.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);



        if ($validator->fails()) {
            return redirect()
                ->route('cms.user.edit',$user->id)
                ->withErrors($validator)
                ->withInput();
        }

    $imageName = '';
        if($request->image){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/users'),$imageName);
            $user->image = $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != null && $request->password != ''){
        $user->password = Hash::make($request->password);
        $user->force_logout_token = "password changed";
        }
        $user->status = $request->has('status') ? 1 : 0;
        $user->update();

        $user->roles()->sync($request->role);
        return redirect()->route('cms.user')->with('success',"User has been updated successfully!!!");
    }


    public function destroy($id)
    {
        $this->authorize('delete',User::class);
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->roles()->detach();

        $user->delete();

        return response()->json(['success' => 'User deleted successfully']);
    }

    public function updateStatus($id, $status)
    {
        $this->authorize('update',User::class);

        try {
            $user = User::find($id);
            if ($user) {
                $user->status = $status;
                $user->update();
                return response()->json(['success' => 'Status updated successfully']);
            } else {
                return response()->json(['error' => 'Post not found'], 404);
            }
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update status'], 500);
        }
    }
}
