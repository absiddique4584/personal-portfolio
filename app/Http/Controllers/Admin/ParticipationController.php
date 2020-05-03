<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participation;
use Exception;
class ParticipationController extends Controller
{

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $participations = Participation::latest()->get();

        return view('admin.participation.manage', compact('participations'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.participation.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'year_date' => 'required',
        ]);
        $participations = null;
        try {
            $participations = Participation::create([
                'name' => $request->name,
                'title' => $request->title,
                'desc' => $request->desc,
                'year_date' => $request->year_date,

            ]);
        } catch (Exception $exception) {
            $participations = false;
        }

        if ($participations) {
            setMessage('success', 'Yay! A Participation has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Participation.');
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
        $participations = Participation::find($id);

        return view('admin.participation.edit', compact('participations'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $id = $request->id;
        $participations = Participation::find($id);

        $request->validate([
            'name' => 'required',
            'title' => 'required',
            'desc' => 'required',
            'year_date' => 'required'
        ]);

        $success = null;
        try {
            $success = $participations->update([
                'name' => $request->name,
                'title' => $request->title,
                'desc' => $request->desc,
                'year_date' => $request->year_date,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Participation has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Participation.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $participations         = Participation::find($id);
        $participations->status = $status;
        $participations->save();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $participations = Participation::find($id);
        $participations->delete();
        setMessage('success', 'Participation has been successfully deleted!');
        return redirect()->back();
    }
}
