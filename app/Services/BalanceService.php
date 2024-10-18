<?php

namespace App\Services;

use App\Models\User;
use App\Models\Balance;
use Illuminate\Http\Request;
use App\Models\BalanceTransaction;
use App\Models\Enums\TransactionType;
use App\Services\Ports\IBalanceService;
use App\Repositories\Ports\IUserRepository;
use App\Repositories\Ports\IBalanceRepository;
use App\Repositories\Ports\IBalanceTransactionRepository;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class BalanceService implements IBalanceService
{

    public function __construct(
        private readonly IUserRepository $iUserRepository,
        private readonly IBalanceRepository $iBalanceRepository,
        private readonly IBalanceTransactionRepository $iBalanceTransactionRepository,
    ) {}

    public function getAccountInfo(int $userId)
    {
        $user = $this->iUserRepository->getOneById($userId);
        if ($user == null) {
            throw new NotFoundResourceException("User not founded");
        }
        $accountInfo = $this->iBalanceRepository->getAccountInfo($user->id);

        if ($accountInfo == null) {
            $accountInfo = new Balance();
            $accountInfo->balance = 0.0;
            $accountInfo->user_id = $user->id;
            $accountInfo->save();
        }

        return $accountInfo;
    }
    public function addBalanceTransaction(Request $request, TransactionType $type, User $user) {
        $balanceTransaction = new BalanceTransaction();
        $balanceTransaction->received = $request->received;
        $balanceTransaction->received_when = $request->received_when;
        $balanceTransaction->description = $request->description;
        $balanceTransaction->value = $request->value;
        $balanceTransaction->type = $type->value; 
        $balanceTransaction->balance_id = $user->balance->id;
        $save = $this->iBalanceTransactionRepository->save($balanceTransaction);
        return $save;
    }
}
