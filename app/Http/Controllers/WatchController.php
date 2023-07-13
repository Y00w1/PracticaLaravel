<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Watch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('shop', ['watches' => Watch::latest()->filter(request(['search']))->paginate(1)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('watch.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => 'required',
        'price' => 'required|numeric',
        'image' => 'required|image',
        'description' => 'required',
        'stock' => 'required|numeric|integer',
    ]);
    $path = Storage::disk('public')->put('images', $request->file('image'));
    $watch = new Watch();
    $watch->name = $request->get('name');
    $watch->price = $request->get('price');
    $watch->image = $path;
    $watch->description = $request->get('description');
    $watch->stock = $request->get('stock');
    $watch->save();

    return redirect()->route('shop')->with('success', 'watch created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Watch $watch)
    {
        return view('watch.show', compact('watch'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Watch $watch)
    {
        return view('watch.edit', compact('watch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Watch $watch)
    {
        $fields = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'stock' => 'required|numeric|integer',
        ]);
        if($request->hasFile('image')){
            $fields['image'] = Storage::disk('public')->put('images', $request->file('image'));
            if ($oldPath = $watch->image) {
                Storage::disk('public')->delete($oldPath);
            }
        }
        $watch->update($fields);
        return redirect()->route('shop')->with('success', 'watch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Watch $watch)
    {
        $watch->delete();
        return redirect()->route('shop')->with('success', 'watch deleted successfully');
    }
}
