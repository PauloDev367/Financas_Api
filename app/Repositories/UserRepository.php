<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Ports\IUserRepository;

class UserRepository implements IUserRepository
{
    public function getOneById(int $id)
    {
        return User::where("id", $id)->first();
    }
    
}
