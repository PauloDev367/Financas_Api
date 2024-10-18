<?php

namespace App\Models\Enums;

enum TransactionType: int
{
    case INCOME = 0;
    case EXPENSE = 1;
}
