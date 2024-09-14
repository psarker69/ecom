<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('is_active',1)
        ->with('category')
        ->latest('id')
        ->select(['id', 'category_id', 'product_name', 'slug','product_price', 'product_stock', 'alert_quantity', 'product_image', 'product_rating', 'updated_at'])
        ->paginate(20);

        return view('backend.pages.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_active',1)->select(['id', 'title'])->get();
        return view('backend.pages.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {

        // dd($request->all());

        $product = Product::create([
            'category_id'=>$request->category_id,
            'product_name'=>$request->product_name,
            'slug'=>Str::slug($request->product_name),
            'product_price'=>$request->product_price,
            'product_code'=>$request->product_code,
            'product_stock'=>$request->product_stock,
            'alert_quantity'=>$request->alert_quantity,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'additional_info'=>$request->additional_info,
        ]);

        $this->image_upload($request, $product->id);
        $this->multiple_image_upload($request, $product->id);

        Toastr::success('Data Store Success');
        return redirect()->route('products.index');

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
        $product = Product::whereSlug($slug)->first();
        $categories = Category::where('is_active',1)->select(['id', 'title'])->get();

        return view('backend.pages.product.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $slug)
    {
        $product = Product::whereSlug($slug)->first();

        $product->update([
            'category_id'=>$request->category_id,
            'product_name'=>$request->product_name,
            'slug'=>Str::slug($request->product_name),
            'product_price'=>$request->product_price,
            'product_code'=>$request->product_code,
            'product_stock'=>$request->product_stock,
            'alert_quantity'=>$request->alert_quantity,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'additional_info'=>$request->additional_info,
        ]);

        $this->image_upload($request, $product->id);
        $this->multiple_image_upload($request, $product->id);

        Toastr::success('Data Update Success');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product = Product::whereSlug($slug)->first();

        if($product->product_image != '' && $product->product_image != 'default-product.jpg') {
            $photo_location = 'public/uploads/products/'.$product->product_image;
            unlink(base_path($photo_location));
        }

        $product->delete();

        Toastr::success('Data Delete Success');
        return redirect()->route('products.index');
    }

    public function image_upload($request, $product_id)
    {
        $product = Product::findorFail($product_id);
        $photo_location = 'public/uploads/products/';

        if($request->hasFile('product_image')) {

            if($product->product_image != 'default-product.jpg') {

                $old_photo_location = $photo_location.$product->product_image;
                unlink(base_path($old_photo_location));
            }
            $new_photo = $request->file('product_image');
            $new_photo_name = $product->id.'.'.$new_photo->getClientOriginalExtension();
            $new_photo_location = $photo_location.$new_photo_name;
            Image::make($new_photo)->resize(600,622)->save(base_path($new_photo_location),40);

            $product->update([
                'product_image' =>$new_photo_name,
            ]);
        }

    }

    public function multiple_image_upload($request, $product_id)
    {
        if($request->hasFile('product_multiple_image')) {



            $multiple_images = ProductImage::where('product_id', $product_id)->get();

            foreach ($multiple_images as $multiple_image) {

                if ($multiple_image->product_multiple_photo_name != 'default-product.jpg') {

                    $photo_location = 'public/uploads/products/';
                    $old_photo_location = $photo_location . $multiple_image->image_name;
                    unlink(base_path($old_photo_location));
                }

                $multiple_image->delete();
            }


            $flag = 1;

            foreach($request->file('product_multiple_image') as $single_image) {
                $photo_location = 'public/uploads/products/';
                $new_photo_name = $product_id . '-' .$flag . '.' . $single_image->getClientOriginalExtension();
                $new_photo_location = $photo_location.$new_photo_name;

                Image::make($single_image)->resize(600,622)->save(base_path($new_photo_location), 40);

                ProductImage::create([
                    'product_id' => $product_id,
                    'image_name' =>$new_photo_name,
                ]);

                $flag++;
            }
        }
    }

}
