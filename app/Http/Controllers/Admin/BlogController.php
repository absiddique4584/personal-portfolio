<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Exception;
class BlogController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blog.manage', compact('blogs'));
    }





    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.blog.create');
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required',
            'title'     => 'required',
            'desc' => 'required',
            'image'     => 'required',
        ]);
        $blogs = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/blog/'), $fileName);

            $blogs = Blog::create([
                'name'       =>$request->name,
                'title'      => $request->title,
                'desc'       => $request->desc,
                'image'      => $fileName,
            ]);
        } catch (Exception $exception) {
            $blogs = false;
        }

        if ($blogs) {
            setMessage('success', 'Yay! A Blog has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new Blog.');
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
        $blogs = Blog::find($id);

        return view('admin.blog.edit', compact('blogs'));
    }




    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $blogs = Blog::find($id);

        $request->validate([
            'name'      =>'required',
            'title'     => 'required',
            'desc'      => 'required',
            'image'     => 'required',
        ]);

        $success = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/blog/'), $fileName);

            $success = $blogs->update([
                'name'     =>$request ->name,
                'title'     => $request->title,
                'desc' => $request->desc,
                'image'     => $fileName,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A Blog has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update Blog.');
        }
        return redirect()->back();
    }




    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $blogs         = Blog::find($id);
        $blogs->status = $status;
        $blogs->save();
    }




    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id     = base64_decode($id);
        $blogs = Blog::find($id);
        $blogs->delete();
        setMessage('success', 'Blog has been successfully deleted!');
        return redirect()->back();
    }
}
