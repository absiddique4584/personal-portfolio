<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use Exception;
class MessageController extends Controller
{


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $messages = Message::latest()->get();

        return view('admin.message.manage', compact('messages'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('site.index');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'comments' => 'required',
        ]);
        $messages = null;
        try {

            $messages = Message::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'comments' => $request->comments,
            ]);
        } catch (Exception $exception) {
            $messages = false;
        }

        if ($messages) {
            setMessage('success', 'Yay! A Messages has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Messages.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id     = base64_decode($id);
        $messages = Message::find($id);
        $messages->delete();
        setMessage('success', 'Messages has been successfully deleted!');
        return redirect()->back();
    }
}
