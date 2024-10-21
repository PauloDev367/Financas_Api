<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Enums\CategoryTypes;
use App\Services\Ports\ICategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(
        private readonly ICategoryService $iCategoryService,
    ) {}

    public function createIncomeCategory(CreateCategoryRequest $request)
    {
        $user = auth()->user();
        $created = $this->iCategoryService->create($request, $user, CategoryTypes::INCOME);
        return response()->json(['success' => $created]);
    }
    public function createExpenseCategory(CreateCategoryRequest $request)
    {
        $user = auth()->user();
        $created = $this->iCategoryService->create($request, $user, CategoryTypes::EXPENSE);
        return response()->json(['success' => $created]);
    }
    public function getIncome()
    {
        $user = auth()->user();
        $data = $this->iCategoryService->getAllFromUser($user, CategoryTypes::INCOME);
        return response()->json(['success' => $data]);
    }
    public function getExpense()
    {
        $user = auth()->user();
        $data = $this->iCategoryService->getAllFromUser($user, CategoryTypes::EXPENSE);
        return response()->json(['success' => $data]);
    }
    public function delete(int $id)
    {
        $user = auth()->user();
        $this->iCategoryService->delete($id, $user);
        return response()->json(['success' => 'Category deleted successfully']);
    }
    public function update(int $id, UpdateCategoryRequest $request)
    {
        $user = auth()->user();
        $update = $this->iCategoryService->update($id, $user, $request);
        return response()->json(['success' => $update]);
    }
}
