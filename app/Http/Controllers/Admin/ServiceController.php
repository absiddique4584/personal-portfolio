<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Exception;
class ServiceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $services = Service::latest()->get();

        return view('admin.service.manage', compact('services'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.service.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'short_des' => 'required',
        ]);
        $services = null;
        try {
            $services = Service::create([
                'name' =>$request->name,
                'short_des' => $request->short_des,
            ]);
        } catch (Exception $exception) {
            $services = false;
        }

        if ($services) {
            setMessage('success', 'Yay! A services has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Services.');
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
        $services = Service::find($id);

        return view('admin.service.edit', compact('services'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $id = $request->id;
        $services = Service::find($id);

        $request->validate([
            'name' => 'required',
            'short_des' => 'required',
        ]);

        $success = null;
        try {
            $success = $services->update([
                'name' =>$request->name,
                'short_des' => $request->short_des,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A services has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update services.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $services         = Service::find($id);
        $services->status = $status;
        $services->save();
    }





    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $services = Service::find($id);
        $services->delete();
        setMessage('success', 'services has been successfully deleted!');
        return redirect()->back();
    }
}
