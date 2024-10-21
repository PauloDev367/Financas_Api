<?php

namespace App\Repositories\Ports;

use App\Models\Category;
use App\Models\Enums\CategoryTypes;

interface ICategoryRepository
{
    public function save(Category $category);
    public function getAllFromUser(int $balanceId, CategoryTypes $type);
    public function getOneById(int $categoryId, int $balanceId);
}
