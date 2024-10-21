<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Ports\ICategoryRepository;

class CategoryRepository implements ICategoryRepository
{
    public function save(Category $category)
    {
        $category->save();
        return $category;
    }
}
