<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use App\Http\Requests\TestimonialStoreRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::latest('id')->select(['id', 'client_name', 'client_name_slug', 'client_designation', 'client_image', 'updated_at'])->paginate();

        return view('backend.pages.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialStoreRequest $request)
    {
       $testimonial = Testimonial::create([
        'client_name' => $request->client_name,
        'client_name_slug' => Str::slug($request->client_name),
        'client_designation' => $request->client_designation,
        'client_message' => $request->client_message,
       ]);

       $this->image_upload($request, $testimonial->id);

       Toastr::success('Successfully store data');
       return redirect()->route('testimonial.index');
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
        $testimonial = Testimonial::where('client_name_slug',$slug)->first();

        return view('backend.pages.testimonial.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function image_upload($request, $id)
    {
        $testimonial = Testimonial::findorFail($id);
        $photo_location = 'public/uploads/testimonials';

        if($request->hash_file('client_image')) {

        if($testimonial->client_image != 'default-client') {
        $old_photo_location = $photo_location.$testimonial->client_image;
        unlink(base_path($old_photo_location));

        }

        $new_photo = $request->file('client_image');
        $new_photo_name = $testimonial->id . '.' . $new_photo->getClientOriginalExtension();
        $new_photo_location = $photo_location . $new_photo_name;
        Image::make($new_photo_location)->resize(150,150)->save(base_path($new_photo_location), 40);

        $testimonial->update([
            'client_image' => $new_photo_name,
        ]);

        }
    }
}
