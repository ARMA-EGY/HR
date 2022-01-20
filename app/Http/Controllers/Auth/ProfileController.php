<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Countries;
use App\User;
use App\Http\Requests\User\UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

use Image;

class ProfileController extends Controller
{

    //-------------- Profile Page ---------------\\
    public function profile()
    {
        $user = auth()->user();
        
        return view('auth.profile', [
            'countries'   => Countries::all(),
        ]);
        
    }

    //-------------- Edit User Info ---------------\\
    public function editinfo(UpdateRequest $request)
    {
        $user            = User::where('id', $request->id)->first();

        $data = $request->only(['name', 'email', 'gender', 'phone', 'birthdate', 'nationality']);

        $user->update($data);

        if($user)
        {
            return response()->json([
                'status' => 'true',
                'msg' => 'success'
            ]) ;
        }
        else
        {
            return response()->json([
                'status' => 'false',
                'msg' => 'error'
            ]) ;
        }
    }

    //-------------- Change Profile Picture ---------------\\
    public function changeProfilePicture(Request $request)
    {
            $user            = User::where('id', $request->id)->first();
            $image_path      = base_path().env('PUBLIC_PATH').'/'.$user->avatar;

            $image = $request->file('avatar');
            $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        
            $destinationPath = base_path().env('PUBLIC_PATH');
            ini_set('memory_limit', '256M');
            $img = Image::make($image->getRealPath());
            $img->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/images/avatars/'.$input['imagename']);

            $avatar = 'images/avatars/'.$input['imagename'];

            $user->avatar     = $avatar;
            $user->save();

            unlink($image_path);

            if($user)
            {
                return response()->json([
                    'status' => 'true',
                    'msg' => 'success'
                ]) ;
            }
            else
            {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'error'
                ]) ;
            }
    }

    //-------------- Change Password ---------------\\
    public function changepassword(Request $request)
    {
            $user            = User::where('id', $request->id)->first();
            $old_password    = Hash::make($request->oldpassword);
            $new_password    = Hash::make($request->newpassword);

            $check  = Hash::check($request->oldpassword, $user->password);


            if($request->oldpassword == '')
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'Current Password Required'
                ]) ;
            }
            elseif($request->newpassword == '')
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'New Password Required'
                ]) ;
            }
            elseif(strlen($request->newpassword)  < 8)
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'The password must be at least 8 characters.'
                ]) ;
            }
            elseif(!$check)
            {
                return response()->json([
                'status' => 'error',
                'msg' => 'Current password is wrong'
                ]) ;
            }

            $data['password'] = $new_password;
            $user->update($data);

            if($user)
            {
                return response()->json([
                    'status' => 'true',
                    'msg' => 'success'
                ]) ;
            }
            else
            {
                return response()->json([
                    'status' => 'false',
                    'msg' => 'error'
                ]) ;
            }
    }

   
}
