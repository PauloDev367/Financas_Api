<?php

namespace App\Services\Ports;

use App\Models\User;
use App\Models\Enums\CategoryTypes;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

interface ICategoryService
{
    public function create(CreateCategoryRequest $request, User $user, CategoryTypes $type);
    public function getAllFromUser(User $user, CategoryTypes $type);
    public function delete(int $categoryId, User $user);
    public function update(int $categoryId, User $user, UpdateCategoryRequest $request);
}
