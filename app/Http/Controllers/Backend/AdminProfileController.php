<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;


class AdminProfileController extends Controller
{
    public function AdminProfile(){
        $adminData = Admin::find(1);
        return view('admin.admin_profile_page', compact('adminData'));
    }

    public function AdminProfileEdit(){

        $editData = Admin::find(1);
        return view('admin.admin_profile_edit', compact('editData'));

    }
//  admin profile image function start
    public function AdminProfileStore( Request $request){
        $data = Admin::find(1);
        $data->name = $request->admin_name;
        $data->email = $request->email;


        if($request->file('profile_photo_path')){
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $filename = date('Ymd').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
        }
        $data->save();
        $notification = array(
            'message' => 'Admin profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }//  user profile change function finished



    public function AdminChangePassword(){
        return view('admin.admin_change_password');
    }

//  admin profile change password function start
    public function AdminUpdatePassword(Request $request){
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

            $hashedPassword = Admin::find(1)->password;
            if(Hash::check($request->oldpassword,$hashedPassword)){
                $admin = Admin::find(1);
                $admin->password = Hash::make($request->password);
                $admin->save();
                Auth::logout();
                return redirect()->route('admin.logout');
            }else{
                return redirect()->back();
            }

    }//  admin profile change password function finished







}
