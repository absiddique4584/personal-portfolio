<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Exception;
class ProfileController extends Controller
{




    public function profile(){
        $profiles = Profile::where('id',1)->get();
        return view('admin.profile.manage',compact('profiles'));
    }




    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $profiles = Profile::where('id',1)->get();

        return view('admin.profile.edit', compact('profiles'));
    }






    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $profiles = Profile::get();

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'image'=>'required'
        ]);

        try {

        $image    = $request->file('image');
        $fileEx   = $image->getClientOriginalExtension();
        $fileName = date('Ymdhis.') . $fileEx;
        $image->move(public_path('uploads/profile/'), $fileName);


            Profile::update([
                'name' => $request->name,
                'address' =>$request->address,
                'phone' => $request->phone,
                'image' => $fileName
            ]);
            setMessage('success', 'Yay! A Profile has been successfully updated.');
        }catch (Exception $exception){

            setMessage('danger', 'Oops! Unable to update Profile.');
            return redirect()->back();
        }

        }

}
