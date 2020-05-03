<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Exception;
class ProjectController extends Controller
{




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $projects = Project::latest()->get();

        return view('admin.project.manage', compact('projects'));
    }





    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.project.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required',

        ]);

        $projects = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/project/'), $fileName);

            $projects = Project::create([
                'image' => $fileName,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]);
        } catch (Exception $exception) {
            $projects = false;
        }

        if ($projects) {
            setMessage('success', 'Yay! A Project has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Project.');
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
        $projects = Project::find($id);

        return view('admin.project.edit', compact('projects'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request, $id)
    {
        $projects = Project::find($id);

        $request->validate([
            'image' => 'required',

        ]);


        $success = null;
        try {
            $image    = $request->file('image');
            $fileName = rand(0, 999999999) . '_' . date('Ymdhis') . '_' . rand(99999, 999999999) . '.' . $image->getClientOriginalExtension();
            if ($image->isValid()) {
                if ($image->getMimeType() === "image/png" || $image->getMimeType() === "image/jpeg") {
                    $image->storeAs('project', $fileName);
                } else {
                    setMessage("Something wrong !","danger");
                    return redirect()->back();
                }
            }


            $success = $projects->update([
                'image' => $fileName,
                'title' => $request->title,
                'sub_title' => $request->sub_title,
            ]);

        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Project has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Project.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $projects         = Project::find($id);
        $projects->status = $status;
        $projects->save();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $projects = Project::find($id);
        $projects->delete();
        setMessage('success', ' A Project has been successfully deleted!');
        return redirect()->back();
    }
}
