<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();

        return view('admin.category.manage', compact('categories'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $categories = null;
        try {
            $name     = $request->name;
            $categories = Category::create([
                'name' => $name,
                'slug' => slugify($name)
            ]);
        } catch (Exception $exception) {
            $categories = false;
        }

        if ($categories) {
            setMessage('success', 'Yay! A category has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new category.');
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
        $categories = Category::find($id);

        return view('admin.category.edit', compact('categories'));
    }

    public function update(Request $request)
    {
        $id = $request->id;

        $categories = Category::find($id);

        $request->validate([
            'name' => 'required',
        ]);

        $success = null;
        try {
            $name    = $request->name;
            $success = $categories->update([
                'name' => $name,
                'slug' => slugify($name)
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A category has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update category.');
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $categories         = Category::find($id);
        $categories->status = $status;
        $categories->save();
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $categories = Category::find($id);
        $categories->delete();
        setMessage('success', 'Category has been successfully deleted!');
        return redirect()->back();
    }
}
