<?php

namespace App\Http\Controllers\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddExpenseRequest;
use App\Http\Requests\AddIncomeRequest;
use App\Models\Enums\TransactionType;
use App\Services\Ports\IBalanceService;

class BalanceController extends Controller
{
    public function __construct(
        private readonly IBalanceService $iBalanceService,
    ) {}

    public function get()
    {
        $userId = auth()->user()->id;
        $info = $this->iBalanceService->getAccountInfo($userId);
        return response()->json(['success' => $info]);
    }

    public function addIncome(AddIncomeRequest $request)
    {
        $user = auth()->user();
        $save = $this->iBalanceService->addBalanceTransaction($request, TransactionType::INCOME, $user);
        return response()->json(['success' => $save]);
    }

    public function addExpense(AddExpenseRequest $request)
    {
        $user = auth()->user();
        $save = $this->iBalanceService->addBalanceTransaction($request, TransactionType::EXPENSE, $user);
        return response()->json(['success' => $save]);
    }
}
