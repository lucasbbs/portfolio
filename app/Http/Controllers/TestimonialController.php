<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flag = "new";
        $route = route('store.testimonial');
        return view('admin.testimonial.create', compact('flag', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:testimonials',
            'designation' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $image = $request->file('image');
        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/testimonial/';
        $last_img = $up_location . $img_name;
        $image->move($up_location, $img_name);


        $testimonial->image = $last_img;

        $testimonial->save();
        return redirect()->route('index.testimonial')->with('success', 'Testimonial created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flag = "edit";
        $route = route('update.testimonial', $id);
        $testimonial = Testimonial::findOrFail($id);
        return view('admin.testimonial.create', compact('flag', 'route', 'testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:testimonials,name,' . $id,
            'designation' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $testimonial = Testimonial::findOrFail($id);
        $image = $request->file('image');
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        if ($image) {
            $old_image = $testimonial->image;
            unlink($old_image);
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save('image/testimonial/' . $name_gen);
            $testimonial->image = 'image/testimonial/' . $name_gen;
        }
        $testimonial->save();
        return redirect()->route('index.testimonial')->with('success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $image = $testimonial->image;
        unlink($image);
        $testimonial->delete();
        return redirect()->route('index.testimonial')->with('success', 'Testimonial deleted successfully');
    }
}