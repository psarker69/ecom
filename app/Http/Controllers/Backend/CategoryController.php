<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')->select(['id', 'title', 'slug', 'category_image', 'updated_at'])->paginate();

        return view('backend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create([
            'title' =>$request->title,
            'slug' =>Str::slug($request->title),
        ]);

        $this->image_upload($request, $category->id);

        Toastr::success('Data Store Success');
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $category = Category::whereSlug($slug)->first();
        return view('backend.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $slug)
    {
        $category = Category::whereSlug($slug)->first();


        $category->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'is_active' => $request->filled('is_active')
        ]);

        $this->image_upload($request, $category->id);

        Toastr::success('Data Update Successfully');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category = Category::whereSlug($slug)->first();

        $photo_location = 'public/uploads/categories/';

        if($category->category_image != 'default-category.png') {
            unlink(base_path($photo_location.$category->category_image));
        }

        $category->Delete();

        Toastr::success('Data delete Successfully');
        return redirect()->route('category.index');
    }

    public function image_upload($request, $id)
    {
        $category = Category::findorFail($id);
        $photo_location = 'public/uploads/categories/';

        if($request->hasFile('category_image')) {

        if($category->category_image != 'default-category.png') {
        $old_photo_location = $photo_location.$category->category_image;
        unlink(base_path($old_photo_location));

        }

        $new_photo = $request->file('category_image');
        $new_photo_name = $category->id . '.' . $new_photo->getClientOriginalExtension();
        $new_photo_location = $photo_location . $new_photo_name;
        Image::make($new_photo)->resize(600,600)->save(base_path($new_photo_location), 40);

        $category->update([
            'category_image' => $new_photo_name,
        ]);

        }
    }
}
