<?php

namespace App\Http\Controllers;

use App\Models\Fact;
use App\Models\Icon;
use Illuminate\Http\Request;

class FactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $facts = Fact::all();
        return view('admin.facts.index', compact('facts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        $flag = 'new';
        $route = route('store.fact');
        $categories = Icon::select('category')->distinct()->get();
        $icons = Icon::all();
        return view('admin.facts.create', compact('flag', 'route', 'icons', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'number' => 'required|integer',
            'icon_id' => 'required|integer|exists:icons,id',
        ]);

        $fact = new Fact();
        $fact->name = $request->name;
        $fact->description = $request->description;
        $fact->number = $request->number;
        $fact->icon_id = $request->icon_id;
        $fact->save();

        return redirect()->route('index.facts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $flag = 'edit';
        $route = route('update.fact', $id);
        $fact = Fact::findOrFail($id);
        return view('admin.facts.create', compact('fact', 'flag', 'route'));
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
            'name' => 'required|string',
            'description' => 'nullable|string',
            'number' => 'required|integer',
            'icon_id' => 'required|integer|exists:icons,id',
        ]);

        $fact = Fact::findOrFail($id);
        $fact->name = $request->name;
        $fact->description = $request->description;
        $fact->number = $request->number;
        $fact->icon_id = $request->icon_id;
        $fact->save();

        return redirect()->route('index.facts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        $fact = Fact::findOrFail($id);
        $fact->delete();
        return redirect()->route('index.facts');
    }
}
