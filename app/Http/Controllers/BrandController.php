<?php

namespace App\Http\Controllers;

use App\Models\Multipic;
use App\Models\Tags;
use Auth;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Carbon;
use Image;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function AllBrand()
    {
        $brands = Brand::paginate(5);
        $trashBrands = Brand::onlyTrashed()->paginate(
            $perPage = 3, $columns = ['*'], $pageName = 'trash_pages'
        );

        return view('admin.brand.index', compact('brands', 'trashBrands'));
    }

    public function AddImg()
    {
        $flag = 'new';
        $route = route('store.images');
        return view('admin.multipic.create', compact('flag', 'route'));
    }

    function EditImg($id) {
        $flag = 'edit';
        $route = route('update.images', $id);
        return view('admin.multipic.create', compact('flag', 'route'));
    }

    public function StoreBrand(Request $request)
    {
        $request->validate(
            [
                'brand_name' => 'required|unique:brands|max:255',
                'brand_image' => 'required|mimes:jpg,jpeg,png',
            ],
            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_name.max' => 'Brand Less Then 255Chars',
            ]
        );

        $brand_image = $request->file('brand_image');
        // $name_gen = hexdec(uniqid());
        // $img_ext = strtolower($brand_image->getClientOriginalExtension());
        // $img_name = $name_gen . '.' . $img_ext;
        // $up_location = 'image/brand/';
        // $last_img = $up_location . $img_name;
        // $brand_image->move($up_location, $img_name);

        // $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
        // Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);

        // $last_img = 'image/brand/' . $name_gen;

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($brand_image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/brand/';
        $last_img = $up_location . $img_name;
        $brand_image->move($up_location, $img_name);

        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_img,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return Redirect()->back()->with('success', 'Brand Inserted Successfully');
    }

    public function Edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.brand.edit', compact('brand'));
    }

    public function Update(Request $request, $id)
    {
        $request->validate(
            [
                'brand_name' => 'required|max:255'
            ],
            [
                'brand_name.required' => 'Please Input Brand Name',
                'brand_name.max' => 'Brand Less Then 255Chars',
            ]
        );

        $old_image = $request->old_image;

        $brand_image = $request->file('brand_image');

        if ($brand_image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($brand_image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/brand/';
            $last_img = $up_location . $img_name;
            $brand_image->move($up_location, $img_name);
            // $name_gen = hexdec(uniqid()) . '.' . $brand_image->getClientOriginalExtension();
            // Image::make($brand_image)->resize(300, 200)->save('image/brand/' . $name_gen);

            unlink($old_image);

            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'brand_image' => $last_img,
                'updated_at' => Carbon::now(),
            ]);
        } else {
            Brand::find($id)->update([
                'brand_name' => $request->brand_name,
                'updated_at' => Carbon::now(),
            ]);
        }

        return Redirect()->route('all.brands')->with('success', 'Brand Updated Successfully');
    }

    public function SoftDelete($id)
    {
        $delete = Brand::find($id)->delete();
        return Redirect()->back()->with('success', 'Brand Soft Delete Successfully');
    }

    public function Restore($id)
    {
        $delete = Brand::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Brand Restore Successfully');
    }

    public function Pdelete($id)
    {
        $image = Brand::onlyTrashed()->find($id)->brand_image;
        unlink($image);
        $delete = Brand::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Brand Permanently Delete Successfully');
    }
    public function Multpic()
    {
        $images = Multipic::all();
        $tags = Tags::all();
        return view('admin.multipic.index', compact('images', 'tags'));
    }

    public function Show($id)
    {
        $images = Multipic::find($id)->get();
        $tags = Tags::all();
        return view('pages.portfolio', compact('images', 'tags'));
    }

    public function StoreImg(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'tag' => 'required',
            ],
            [
                'name.required' => 'Please Input a Name',
                'tag.required' => 'Please Select a Tag',
            ]
        );
        $image = $request->file('image');

        // foreach ($images as $multi_img) {
        // $name_gen = hexdec(uniqid()).'.'.$multi_img->getClientOriginalExtension();
        // Image::make($multi_img)->resize(300, 200)->save('image/multi/'.$name_gen);

        // $last_img = 'image/multi/'.$name_gen;

        // $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        // Image::make($image)->save('image/multi/' . $name_gen);

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/multi/';
        $last_img = $up_location . $img_name;
        $image->move($up_location, $img_name);

        Multipic::insert([
            'name' => $request->name,
            'image' => $last_img,
            'tag_id' => $request->tag,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        // }

        return Redirect()->back()->with('success', 'Images Inserted Successfully');
    }

    public function DeleteImg($id)
    {
        $image = Multipic::find($id)->image;
        unlink($image);
        $delete = Multipic::find($id)->delete();
        return Redirect()->back()->with('success', 'Image Deleted Successfully');
    }

    public function Logout()
    {
        auth()->guard('web')->logout();
        return Redirect()->route('login')->with('success', 'User Logout');
    }
}