<?php

namespace App\Http\Controllers\Music;

use App\Http\Controllers\Controller;
use App\Http\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->getAll();
        return view('category.list', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->categoryService->create($request);
        \alert("Create Completed !", '', 'success')->autoClose(2000)->timerProgressBar();

        return redirect()->route('category.list');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = $this->categoryService->find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = $this->categoryService->find($id);
        $this->categoryService->update($request, $category);
        \alert("Update Completed !", '', 'success')->autoClose(2000)->timerProgressBar();

        return redirect()->route('category.list');
    }

    public function destroy($id)
    {
        $category = $this->categoryService->find($id);
        $category->delete();
        notify("Deleted Completed !", 'success');

        return redirect()->route('category.list');
    }

    function search(Request $request)
    {
        if ($this->categoryService->searchByKeyword($request)) {
            $categories = $this->categoryService->searchByKeyword($request);
            return view('category.list', compact('categories'));
        }
        return redirect()->route('category.list');
    }
}
