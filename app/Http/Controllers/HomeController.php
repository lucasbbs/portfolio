<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Image;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function HomeSlider()
    {
        $sliders = Slider::paginate();
        return view('admin.slider.index', compact('sliders'));
    }

    public function AddSlider()
    {
        $flag = "new";
        $route = route('store.slider');
        return view('admin.slider.create', compact('flag', 'route'));
    }

    public function StoreSlider(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png',
            'portfolio' => 'required|numeric|exists:portfolios,id',
        ]);

        $slider_image = $request->file('image');

        // $name_gen = hexdec(uniqid()).'.'.$slider_image->getClientOriginalExtension();
        // Image::make($slider_image)->resize(1920,1088)->save('image/slider/'.$name_gen);

        // $last_img = 'image/slider/'.$name_gen;

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($slider_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/slider/';
        $last_img = $up_location . $img_name;
        $slider_image->move($up_location, $img_name);

        Slider::insert([
            'portfolio_id' => $request->portfolio,
            'image' => $last_img,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Slider Inserted Successfully');

    }
    public function EditSlider($id)
    {
        $flag = "edit";
        $route = route('update.slider', $id);
        $slider = Slider::find($id);
        return view('admin.slider.create', compact('flag', 'slider', 'route'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        $old_image = $request->old_image;

        $slider_image = $request->file('image');
        if ($slider_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($slider_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/slider/';
            $last_img = $up_location . $img_name;
            $slider_image->move($up_location, $img_name);

            unlink($old_image);

            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $last_img,
                'updated_at' => Carbon::now(),
            ]);

            return redirect()->route('all.sliders')->with('success', 'Slider Updated Successfully');
        } else {
            Slider::find($id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            return redirect()->route('all.sliders')->with('success', 'Slider Updated Successfully');
        }
    }

    public function DeleteSlider($id)
    {
        $slider = Slider::find($id);
        $old_image = $slider->image;
        unlink($old_image);

        Slider::find($id)->delete();
        return redirect()->back()->with('success', 'Slider Deleted Successfully');
    }

    public function HomeAbout()
    {
        return view('admin.about.index');
    }

    public function HomeTag()
    {
        $tags = Tags::paginate();
        return view('admin.tag.index', compact('tags'));
    }

    public function AddTag()
    {
        $flag = "new";
        $route = route('store.tag');
        return view('admin.tag.create', compact('flag', 'route'));
    }

    public function StoreTag(Request $request)
    {
        Tags::insert([
            'name' => $request->name,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return Redirect()->route('home.tags')->with('success', 'Tag Inserted Successfully');
    }

    public function EditTag($id)
    {
        $flag = "edit";
        $route = route('update.tag', $id);
        $tag = Tags::find($id);
        return view('admin.tag.create', compact('flag', 'tag', 'route'));
    }

    public function UpdateTag(Request $request, $id)
    {
        Tags::find($id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);
        return redirect()->route('home.tags')->with('success', 'Tag Updated Successfully');
    }

    public function DeleteTag($id)
    {
        Tags::find($id)->delete();
        return redirect()->back()->with('success', 'Tag Deleted Successfully');
    }
}