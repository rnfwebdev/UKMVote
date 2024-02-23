<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VoterController extends Controller
{
    public function index(){
        return view('voter.index');
    }

    public function VoterLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function VoterProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('voter.dashboard.voter_public_profile', compact('profileData'));
    }

    public function VoterEditProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('voter.dashboard.voter_edit_profile', compact('profileData'));
    }

    public function VoterStoreProfile(Request $request){

        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        if ($request->file('photo')) {
            
            $file = $request->file('photo');
            @unlink(public_path('upload/voter_images/'.$data->photo));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/voter_images'),$filename);
            $data['photo'] = $filename;

        }

        $data->save();

        $notification = array(
            'message' => 'Voter Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }
}
