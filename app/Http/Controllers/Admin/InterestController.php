<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Interest;
use Exception;
class InterestController extends Controller
{
    public function index()
    {
        $interests = Interest::latest()->get();

        return view('admin.interest.manage', compact('interests'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.interest.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'number' => 'required',
            'title' => 'required',
        ]);
        $interests = null;
        try {
            $interests = Interest::create([
                'icon' => $request->icon,
                'number' => $request->number,
                'title' => $request->title,
            ]);
        } catch (Exception $exception) {
            $interests = false;
        }

        if ($interests) {
            setMessage('success', 'Yay! A Interest has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Interest.');
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
        $interests = Interest::find($id);

        return view('admin.interest.edit', compact('interests'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $id = $request->id;
        $interests = Interest::find($id);

        $request->validate([
            'icon' => 'required',
            'number' => 'required',
            'title' => 'required',
        ]);

        $success = null;
        try {
            $success = $interests->update([
                'icon' => $request->icon,
                'number' => $request->number,
                'title' => $request->title,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Interests has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Interests.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $interests         = Interest::find($id);
        $interests->status = $status;
        $interests->save();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $interests = Interest::find($id);
        $interests->delete();
        setMessage('success', 'Interests has been successfully deleted!');
        return redirect()->back();
    }
}
