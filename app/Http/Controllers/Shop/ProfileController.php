<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ProfileRequest;
use App\Http\Requests\Shop\ProfileRequestUser;
use App\Models\User;
use App\Traits\ImgUpTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ImgUpTrait;
    //
    public function index(){
        try{
        $user = User::where('id',Auth::id())->get()->first();
        if (!$user)
        return redirect()->route('user.profile')->with(['error' => __('user/messages.not_found')]);

        return view('shop/pages/profile',compact('user'));
    }catch (\Exception $ex) {
        return redirect()->route('user.profile')->with(['error' => __('admin/messages.error')]);
    }
    }

    public function update($id, ProfileRequestUser $request){
        // try{
        $User = User::find($id);
        $user = User::where('id',$id)->get()->first();
        if (!$User)
            return redirect()->route('user.profile')->with(['error' => __('admin/messages.not_found')]);
        $logoName = ($request->logo != null) 
        ? $this->SaveImage($request->logo,'uploads/users') 
        : $user->logo;

        $User->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'logo' => $logoName,
            'updated_at'=> now(),
        ]);
        return redirect()->route('user.profile')->with(['success' => __('admin/messages.updated')]);
    // } catch (\Exception $ex) {
    //     return redirect()->route('profile')->with(['error' => __('admin/messages.error')]);
    // }
}
}