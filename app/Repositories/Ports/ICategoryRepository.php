<?php

namespace App\Repositories\Ports;

use App\Models\Category;

interface ICategoryRepository
{
    public function save(Category $category);
}
