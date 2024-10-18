<?php

namespace App\Repositories\Ports;

interface IUserRepository
{
    public function getOneById(int $id);
}
