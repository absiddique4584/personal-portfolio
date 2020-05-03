<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Homepage;
use Exception;
class HomepageController extends Controller
{



    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $homepage = Homepage::latest()->get();

        return view('admin.homepage.manage', compact('homepage'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.homepage.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'     => 'required',
            'sub_title' => 'required',
            'paragraph' => 'required',
            'image'     => 'required',
        ]);
        $homepage = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/homepage/'), $fileName);

            $homepage = Homepage::create([
                'title'     => $request->title,
                'sub_title' => $request->sub_title,
                'paragraph' => $request->paragraph,
                'image'     => $fileName,
            ]);
        } catch (Exception $exception) {
            $homepage = false;
        }

        if ($homepage) {
            setMessage('success', 'Yay! A Homepage has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Homepage.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $id       = base64_decode($id);
        $homepage = Homepage::find($id);

        return view('admin.homepage.edit', compact('homepage'));
    }




    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $homepage = Homepage::find($id);

        $request->validate([
            'title'     => 'required',
            'sub_title' => 'required',
            'paragraph' => 'required',
            'image'     => 'required',
        ]);

        $success = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/homepage/'), $fileName);

            $success = $homepage->update([
                'title'     => $request->title,
                'sub_title' => $request->sub_title,
                'paragraph' => $request->paragraph,
                'image'     => $fileName,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Homepage has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update homepage.');
        }
        return redirect()->back();
    }


    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $homepage         = Homepage::find($id);


        $homepage->status = $status;
        $homepage->save();
    }




    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id     = base64_decode($id);
        $homepage = Homepage::find($id);
        $homepage->delete();
        setMessage('success', 'Homepage has been successfully deleted!');
        return redirect()->back();
    }
}

