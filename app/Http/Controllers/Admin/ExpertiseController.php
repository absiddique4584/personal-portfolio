<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expertise;
use Exception;
class ExpertiseController extends Controller
{
    public function index()
    {
        $expertises = Expertise::latest()->get();

        return view('admin.expertise.manage', compact('expertises'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.expertise.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'percent' => 'required',
            'number' => 'required',
        ]);
        $expertises = null;
        try {
            $expertises = Expertise::create([
                'title' => $request->title,
                'percent' => $request->percent,
                'number' => $request->number,
            ]);
        } catch (Exception $exception) {
            $expertises = false;
        }

        if ($expertises) {
            setMessage('success', 'Yay! A Expertise has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Expertise.');
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
        $expertises = Expertise::find($id);

        return view('admin.expertise.edit', compact('expertises'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $id = $request->id;
        $expertises = Expertise::find($id);

        $request->validate([
            'title' => 'required',
            'percent' => 'required',
            'number' => 'required',
        ]);

        $success = null;
        try {
            $success = $expertises->update([
                'title' => $request->title,
                'percent' => $request->percent,
                'number' => $request->number,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Expertise has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Expertise.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $expertises         = Expertise::find($id);
        $expertises->status = $status;
        $expertises->save();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $expertises = Expertise::find($id);
        $expertises->delete();
        setMessage('success', 'Expertise has been successfully deleted!');
        return redirect()->back();
    }
}
