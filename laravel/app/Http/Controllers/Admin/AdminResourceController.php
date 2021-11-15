<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ResourceRequests\ResourceStoreRequest;
use App\Models\Resource;
use Illuminate\Http\Request;

class AdminResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resource::all();

        return view('admin.resources.index', compact('resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ResourceStoreRequest $request)
    {
        //dd($request);
        $resource = Resource::create($request->validated());
        if($resource) {
            return redirect()
                ->route('admin.resource.index')
                ->with('success', 'Категория успешно добавлена');
        }

        return back()->with('error', 'Категория не добавилась');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  model Resource
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resource $resource)
    {
        try{
            $resource->delete();

            return response()->json(['success' => true]);
        }catch (\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());

            return response()->json(['success' => false]);
        }
    }
}
