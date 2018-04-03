<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
      $this->middleware('auth');
      $this->service = $userService;
    }

    public function index()
    {
      $user = $this->service->index();
      return response()->json($user);
    }
}
