<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Tags;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('admin.portfolio.index', compact('portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $flag = 'new';
        $route = route('store.portfolio');
        $tags = Tags::all();
        return view('admin.portfolio.create', compact('flag', 'route', 'tags'));
    }

    public function slides($id)
    {
        $slides = Slider::where('portfolio_id', $id)->get();
        return view('admin.portfolio.slides', compact('id', 'slides'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:portfolios|required',
            'description' => 'required',
            'date' => 'required',
            'client' => 'required',
            'tag' => 'required|numeric|exists:tags,id',
            'url' => 'required|regex: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $image = $request->file('image');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($image->getClientOriginalExtension());
        $img_name = $name_gen . '.' . $img_ext;
        $up_location = 'image/portfolio/';
        $last_img = $up_location . $img_name;
        $image->move($up_location, $img_name);

        $portfolio = new Portfolio();
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;
        $portfolio->date = $request->date;
        $portfolio->client = $request->client;
        $portfolio->url = $request->url;
        $portfolio->title = $request->title;
        $portfolio->tag_id = $request->tag;
        $portfolio->image = $last_img;
        $portfolio->save();
        return redirect()->route('index.portfolio')->with('success', 'Portfolio Added Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $flag = 'edit';
        $route = route('update.portfolio', $id);
        $portfolio = Portfolio::find($id);
        $tags = Tags::all();
        return view('admin.portfolio.create', compact('flag', 'route', 'portfolio', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:portfolios,name,' . $id,
            'description' => 'required',
            'date' => 'required',
            'client' => 'required',
            'tag' => 'required|numeric|exists:tags,id',
            'url' => 'required|regex: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'title' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $old_image = $request->old_image;
        $image = $request->file('image');

        if ($image) {
            $name_gen = hexdec(uniqid());
            $img_ext = strtolower($image->getClientOriginalExtension());
            $img_name = $name_gen . '.' . $img_ext;
            $up_location = 'image/portfolio/';
            $last_img = $up_location . $img_name;
            $image->move($up_location, $img_name);

            unlink($old_image);
        } else {
            $last_img = $old_image;
        }

        $portfolio = Portfolio::find($id);
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;
        $portfolio->date = $request->date;
        $portfolio->client = $request->client;
        $portfolio->url = $request->url;
        $portfolio->title = $request->title;
        $portfolio->tag_id = $request->tag;
        $portfolio->image = $last_img;
        $portfolio->save();
        return redirect()->route('index.portfolio')->with('success', 'Portfolio Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        return redirect()->route('index.portfolio')->with('success', 'Portfolio Deleted Successfully');
    }
}