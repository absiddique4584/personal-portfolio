<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Exception;

class SubCategoryController extends Controller
{



    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $subcategories = SubCategory::with('category')->latest()->get();

        return view('admin.sub-category.manage', compact('subcategories'));
    }





    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $subcategories = Category::orderBy('name', 'ASC')->get();
        return view('admin.sub-category.create', compact('subcategories'));
    }





    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'title'=>'required',
            'image'     => 'required',
        ]);
        $subcategories = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/subcategory/'), $fileName);

            $subcategories = SubCategory::create([
                'category_id' => $request->category,
                'title'        => $request->title,
                'image' => $fileName,

            ]);
        } catch (Exception $exception) {
            $subcategories = false;
        }

        if ($subcategories) {
            setMessage('success', 'Yay! A subcategory has been successfully created.');
        } else {
            setMessage('danger', 'Oops! Unable to create a new sub category.');
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
        $subcategories = SubCategory::find($id);

        $categories = Category::orderBy('name', 'ASC')->get();

        return view('admin.sub-category.edit', compact('subcategories', 'categories'));
    }




    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function update(Request $request)
    {
        $id = $request->id;

        $subcategories = SubCategory::find($id);

        $request->validate([
            'category' => 'required',
            'title'=>'required',
            'image'     => 'required',
        ]);

        $success = null;
        try {
            $image    = $request->file('image');
            $fileEx   = $image->getClientOriginalExtension();
            $fileName = date('Ymdhis.') . $fileEx;
            $image->move(public_path('uploads/subcategory/'), $fileName);

            $success = $subcategories->update([
                'category_id' => $request->category,
                'title'        => $request->title,
                'image' => $fileName,
            ]);
        } catch (Exception $exception) {
            $success = false;
        }

        if ($success) {
            setMessage('success', 'Yay! A sub category has been successfully updated.');
        } else {
            setMessage('danger', 'Oops! Unable to update sub category.');
        }
        return redirect()->back();
    }

    /**
     * @param $id
     * @param $status
     */
    public function updateStatus($id, $status)
    {
        $subcategories         = SubCategory::find($id);
        $subcategories->status = $status;
        $subcategories->save();
    }


    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $id       = base64_decode($id);
        $subcategories = SubCategory::find($id);
        unlink(public_path('uploads/subcategory/') . $subcategories->image);
        $subcategories->delete();
        setMessage('success', 'SubCategory has been successfully deleted!');
        return redirect()->back();
    }
}
