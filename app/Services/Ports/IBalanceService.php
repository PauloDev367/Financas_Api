<?php

namespace App\Services\Ports;

use App\Models\Enums\TransactionType;
use App\Models\User;
use Illuminate\Http\Request;

interface IBalanceService
{
    public function getAccountInfo(int $userId);
    public function addBalanceTransaction(Request $request, TransactionType $type, User $user);
}
