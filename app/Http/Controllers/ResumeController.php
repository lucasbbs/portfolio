<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resumes = Resume::all();
        $summaryResumes = Resume::where('section', 'summary')->get();
        $educationResumes = Resume::where('section', 'education')->get();
        $professionalResumes = Resume::where('section', 'professional_experience')->get();
        return view('admin.resumes.index', compact('resumes', 'summaryResumes', 'educationResumes', 'professionalResumes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flag = "new";
        $route = route('store.resume');
        return view('admin.resumes.create', compact('flag', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|in:summary,education,professional_experience',
            'company' => 'required_if:section,professional_experience,education',
            'city' => 'required_if:section,professional_experience,education',
            'country' => 'required_if:section,professional_experience,education',
            'start_date' => 'required_if:section,professional_experience,education',
            'description' => 'required',
            'title' => 'required',
        ]);

        $resume = new Resume();
        $resume->title = $request->title;
        $resume->company = $request->company;
        $resume->city = $request->city;
        $resume->state = $request->state;
        $resume->country = $request->country;
        $resume->start_date = $request->start_date;
        $resume->end_date = $request->end_date;
        $resume->description = $request->description;
        $resume->section = $request->section;
        $resume->save();
        return redirect()->route('index.resume')->with('success', 'Resume created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $flag = "edit";
        $route = route('update.resume', $id);
        $resume = Resume::find($id);
        return view('admin.resumes.create', compact('flag', 'route', 'resume'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'section' => 'required|in:summary,education,professional_experience',
            'company' => 'required_if:section,professional_experience,education',
            'city' => 'required_if:section,professional_experience,education',
            'country' => 'required_if:section,professional_experience,education',
            'start_date' => 'required_if:section,professional_experience,education',
            'description' => 'required',
            'title' => 'required',
        ]);

        $resume = Resume::find($id);
        $resume->title = $request->title;
        $resume->company = $request->company;
        $resume->city = $request->city;
        $resume->state = $request->state;
        $resume->country = $request->country;
        $resume->start_date = $request->start_date;
        $resume->end_date = $request->end_date;
        $resume->description = $request->description;
        $resume->section = $request->section;
        $resume->save();
        return redirect()->route('index.resume')->with('success', 'Resume updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resume = Resume::find($id);
        $resume->delete();
        return redirect()->route('index.resume')->with('success', 'Resume deleted successfully');
    }
}
