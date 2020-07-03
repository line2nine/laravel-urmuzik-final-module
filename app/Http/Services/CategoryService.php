<?php


namespace App\Http\Services;


use App\Category;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\SongRepository;

class CategoryService
{
    protected $categoryRepo;
    protected $songRepo;

    public function __construct(CategoryRepository $categoryRepo, SongRepository $songRepo)
    {
        $this->categoryRepo = $categoryRepo;
        $this->songRepo = $songRepo;
    }

    public function getAll()
    {
        return $this->categoryRepo->getAll();
    }

    public function create($request)
    {
        $category = new Category();
        $category->name = $request->name;
        $this->categoryRepo->save($category);
    }

    public function find($id)
    {
        return $this->categoryRepo->find($id);
    }

    public function update($request, $categoryRepo)
    {
        $categoryRepo->name = $request->name;
        $this->categoryRepo->save($categoryRepo);
    }

    public function detail($id)
    {
        return $this->songRepo->filter($id);
    }
}
