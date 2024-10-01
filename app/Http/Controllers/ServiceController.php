<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all()/* orderBy('id')->paginate(5) */;

        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'title_ar' => 'required|string',
            'description_ar' => 'required|string',
        ]);


        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('images', $imageName, 'public');
        }

        $service = Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'title_ar' => $request->title_ar,
            'description_ar' => $request->description_ar,
            'image' => $imageName
        ]);


        return redirect()->route('services.index')
            ->with('status', 'service created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title' => 'string',
            'description' => 'string',
            'title_ar' => 'string',
            'description_ar' => 'string',
        ]);

        $service->title = $request->title;
        $service->description = $request->description;
        $service->title_ar = $request->title_ar;
        $service->description_ar = $request->description_ar;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            Storage::disk('public')->delete('images/' . $service->image);
            $newImage = $request->file('image');
            $newImageName = time() . '_' . $newImage->getClientOriginalName();
            $newImage->storeAs('images', $newImageName, 'public');
            $service->image = $newImageName;
        }
        $service->save();

        return redirect()->route('services.index')->with('status', 'service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services.index')->with('status', 'service deleted successfully');
    }
}
