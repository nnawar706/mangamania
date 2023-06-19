<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategories()
    {
        return $this->category->newQuery()->orderBy('order')->get();
    }

    public function createCategory(Request $request)
    {
        $cat = $this->category->newQuery()->create([
            'name' => $request->name,
        ]);

        $cat->order = $this->category->count();
        $cat->save();
    }

    public function reorderCategories($categories)
    {
        DB::beginTransaction();

        try {
            foreach ($categories as $key => $category)
            {
                $this->category->newQuery()->where('name',$category)->first()->update([
                    'order' => $key + 1
                ]);
            }

            DB::commit();

            return "Categories are re-shuffled successfully.";
        }
        catch (QueryException $ex)
        {
            DB::rollback();

            return "Something went wrong";
        }
    }
}
