<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateCategoryRequest;
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
    public function createExpenseCategory() {}
    public function getIncome() {}
    public function getExpense() {}
}
