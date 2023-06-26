<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $skills = Skill::paginate(5);
        return view('admin.skill.index', compact('skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flag = "new";
        $route = route('store.skill');
        return view('admin.skill.create', compact('flag', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:skills',
            'percent' => 'required|numeric|between:0,100'
        ]);
        $skill = new Skill();
        $skill->name = $request->name;
        $skill->percent = $request->percent;
        $skill->save();
        return redirect()->route('index.skill')->with('success', 'Skill created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flag = "edit";
        $route = route('update.skill', $id);
        $skill = Skill::find($id);
        return view('admin.skill.create', compact('flag', 'route', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|unique:skills,name,' . $id,
            'percent' => 'required|numeric|between:0,100'
        ]);
        $skill = Skill::find($id);
        $skill->name = $request->name;
        $skill->percent = $request->percent;
        $skill->save();
        return redirect()->route('index.skill')->with('success', 'Skill updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->route('index.skill')->with('success', 'Skill deleted successfully');
    }
}
