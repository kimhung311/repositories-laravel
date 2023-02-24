<?php

namespace App\Repositories;

use App\Models\Blog;
use App\Models\User as ModelsUser;
use App\User;
use App\Repositories\Interfaces\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
   public function all()
   {
       return Blog::all();
   }

   public function getByUser(ModelsUser $user)
   {
       return Blog::where('user_id'. $user->id)->get();
   }
}
