<?php

namespace App\Http\Controllers;

use App\Models\Icon;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $flag = 'create';
        $route = route('store.service');
        $categories = Icon::select('category')->distinct()->get();
        $icons = Icon::all();
        return view('admin.services.create', compact('flag', 'route', 'categories', 'icons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'icon_id' => 'required|exists:icons,id',
        ]);
        Service::create($request->all());
        return redirect()->route('index.service')->with('success', 'Service created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $flag = 'edit';
        $route = route('update.service', $id);
        $service = Service::findOrFail($id);
        $categories = Icon::select('category')->distinct()->get();
        $icons = Icon::all();
        return view('admin.services.create', compact('flag', 'route', 'service', 'categories', 'icons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'icon_id' => 'required|exists:icons,id',
        ]);
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return redirect()->route('index.service')->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('index.service')->with('success', 'Service deleted successfully');
    }
}
