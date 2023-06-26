<?php

namespace App\Http\Controllers;

use App\Models\HomeAbout;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'Portfolio']);
    }
    public function HomeAbout()
    {
        $abouts = HomeAbout::latest()->get();
        return view('admin.about.index', compact('abouts'));
    }

    // public function AddAbout()
    // {
    //     $route = route('store.about');
    //     return view('admin.about.create', compact('route'));
    // }

    public function StoreAbout(Request $request)
    {
        $request->validate([
            'date_of_birth' => 'required',
            'profession' => 'required',
            'phone' => 'required|regex:/^\+\d+$/',
            'email' => 'required',
            'website' => 'required|regex: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'city' => 'required',
            'country' => 'required',
            'freelance' => 'nullable|boolean',
            'degree' => 'required',
        ]);
        $newAbout = new HomeAbout();
        $newAbout->date_of_birth = $request->date_of_birth;
        $newAbout->profession = $request->profession;
        $newAbout->phone = $request->phone;
        $newAbout->email = $request->email;
        $newAbout->website = $request->website;
        $newAbout->city = $request->city;
        $newAbout->country = $request->country;
        $newAbout->freelance = $request->freelance  == 0;
        $newAbout->degree = $request->degree;
        $newAbout->save();

        return Redirect()->route('home.about')->with('success', 'About Inserted Successfully');
    }

    public function EditAbout()
    {
        $about = HomeAbout::latest()->first();
        if ($about) {
            $id = $about->id;
            $route = route('update.about', $id);
            $about = HomeAbout::find($id);
            return view('admin.about.create', compact('about', 'route'));
        } else {
            $route = route('store.about');
            return view('admin.about.create', compact('route'));
        }

    }

    public function UpdateAbout(Request $request, $id)
    {
        $request->validate([
            'date_of_birth' => 'required',
            'profession' => 'required',
            'phone' => 'required|regex:/^\+\d+$/',
            'email' => 'required',
            'website' => 'required|regex: /^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'city' => 'required',
            'country' => 'required',
            'freelance' => 'nullable|boolean',
            'degree' => 'required',
        ]);
        $about = HomeAbout::find($id);
        $about->date_of_birth = $request->date_of_birth;
        $about->profession = $request->profession;
        $about->phone = $request->phone;
        $about->email = $request->email;
        $about->website = $request->website;
        $about->city = $request->city;
        $about->country = $request->country;
        $about->freelance = $request->has('freelance');
        $about->degree = $request->degree;
        $about->save();
        
        return Redirect()->route('home.about')->with('success', 'About Updated Successfully');
    }

    public function DeleteAbout($id)
    {
        $delete = HomeAbout::find($id)->delete();
        return Redirect()->back()->with('success', 'About Deleted Successfully');
    }

    public function Portfolio($id)
    {
        $portfolio = Portfolio::find($id);
        $slides = DB::table('sliders')->where('portfolio_id', $portfolio->id)->get();
        return view('pages.portfolio', compact('portfolio', 'slides'));
    }
}