<?php

namespace App\Services;

use App\Models\User;
use App\Models\Category;
use App\Models\Enums\CategoryTypes;
use App\Services\Ports\ICategoryService;
use App\Http\Requests\CreateCategoryRequest;
use App\Repositories\Ports\ICategoryRepository;

class CategoryService implements ICategoryService
{
    public function __construct(
        private readonly ICategoryRepository $iCategoryRepository,
    ) {}

    public function create(CreateCategoryRequest $request, User $user, CategoryTypes $type)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->icon = $request->icon;
        $category->icon_color = $request->icon_color;
        $category->icon_bg_color = $request->icon_bg_color;
        $category->type = $type->value;
        $category->balance_id = $user->balance->id;
        $saved = $this->iCategoryRepository->save($category);
        return $saved;
    }
    public function getAllFromUser(User $user, CategoryTypes $type)
    {
        $data = $this->iCategoryRepository->getAllFromUser($user->balance->id, $type);
        return $data;
    }
}
