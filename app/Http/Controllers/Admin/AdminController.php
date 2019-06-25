<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;
use App\User;
use Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function view_profile(){
        $user = Auth::user();
        return view('admin.profile.view_profile',['user'=>$user]);
    }

    public function update_image(Request $request){
        $validation = Validator::make($request->all(), [
            'select_file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($validation->passes())
        {
            $user = Auth::user();
            $image = $request->file('select_file');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('admn/images'), $new_name);

            $user = User::find($user->id);
            $user->avatar = $new_name;
            $user->save();

            return response()->json([
            'message'   => 'Image Upload Successfully',
            'uploaded_image' => '<img src="/admn/images/'.$new_name.'" alt="admin" class="admin_img_width" />',
            'class_name'  => 'alert-success'
            ]);
            }
            else
            {
            return response()->json([
            'message'   => $validation->errors()->all(),
            'uploaded_image' => '',
            'class_name'  => 'alert-danger'
            ]);
        }
    }

     public function update_detail(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::user()->id.',id',
            'username' => 'required|alpha_num|max:30|unique:users,username,'.Auth::user()->id.',id',
        ]);
        
        $user = User::find($user->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->phone = $request->phone;
        $user->save();

        return redirect()->back();
     }

     public function change_password(){
         return view('admin.profile.change_password');
     }
     public function update_password(Request $request){
        $user = Auth::user();
        $validatedData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user = User::find($user->id);
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password updated successfully');
        }else{
            return redirect()->back()->withErrors(['Invalid current password']);
        }

        
     }

     public function users_list(){
         $users = User::all();

         return view('admin.users.user_list',['users'=>$users]);
     }
}
