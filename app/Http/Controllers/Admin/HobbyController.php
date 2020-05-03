<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hobby;
use Exception;
class HobbyController extends Controller
{





    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $hobbies = Hobby::latest()->get();

        return view('admin.hobby.manage', compact('hobbies'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.hobby.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $hobbies = null;
        try {
            $name     = $request->name;
            $hobbies = Hobby::create([
                'name' => $name,
                'slug' => slugify($name)
            ]);
        } catch (Exception $exception) {
            $hobbies = false;
        }

        if ($hobbies) {
            setMessage('success', 'Yay! A Hobbies has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Hobbies.');
        }
        return redirect()->back();
    }





    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id       = base64_decode($id);
        $hobbies = Hobby::find($id);

        return view('admin.hobby.edit', compact('hobbies'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $id = $request->id;
        $hobbies = Hobby::find($id);

        $request->validate([
            'name' => 'required'
        ]);

        $success = null;
        try {
            $name    = $request->name;
            $success = $hobbies->update([
                'name' => $name,
                'slug' => slugify($name)
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Hobbies has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Hobbies.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $hobbies         = Hobby::find($id);
        $hobbies->status = $status;
        $hobbies->save();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $hobbies = Hobby::find($id);
        $hobbies->delete();
        setMessage('success', 'Hobbies has been successfully deleted!');
        return redirect()->back();
    }
}
