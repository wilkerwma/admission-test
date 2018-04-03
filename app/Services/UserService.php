<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\User;

class UserService
{
    public function index()
    {
      $user = User::all();
      return $user;
    }
}
