<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequests\CreateCategoryRequest;
use App\Http\Requests\CategoryRequests\EditCategoryRequest;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::Paginate(8);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the comment for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if($category) {
            return redirect()
                ->route('admin.categories.index')
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
     * Show the comment for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditCategoryRequest $request, Category $category)
    {
        $category = $category->fill($request->validated())->save();
        if($category) {
            return redirect()
                ->route('admin.categories.index')
                ->with('success', __('messages.admin.categories.update.success'));
        }

        return back()->with('error', __('messages.admin.categories.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
//        $category->delete();
//        return redirect()
//            ->route('admin.categories.index')
//            ->with('success', 'Категория успешно удалена');
        try{
            $category->delete();

            return response()->json(['success' => true]);
        }catch (\Exception $e) {
            \Log::error($e->getMessage() . PHP_EOL, $e->getTrace());

            return response()->json(['success' => false]);
        }
    }
}
