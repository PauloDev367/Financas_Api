<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Enums\CategoryTypes;
use App\Repositories\Ports\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    public function save(Category $category)
    {
        $category->save();
        return $category;
    }
    public function getAllFromUser(int $balanceId, CategoryTypes $type)
    {
        $query = Category::query();
        $query->where("balance_id", $balanceId);
        $query->where("type", $type->value);

        return $query->paginate(10);
    }
    public function getOneById(int $categoryId, int $balanceId)
    {
        return Category::where("id", $categoryId)
            ->where("balance_id", $balanceId)->first();
    }
    public function update(Category $category){
        $category->save();
        return $category;
    }
}
