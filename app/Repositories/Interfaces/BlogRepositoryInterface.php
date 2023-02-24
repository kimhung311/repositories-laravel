<?php

namespace App\Repositories\Interfaces;

use App\Models\User as ModelsUser;
use App\User;

interface BlogRepositoryInterface
{
   public function all();

   public function getByUser(ModelsUser $user);
}
