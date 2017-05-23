<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
  function login(Request $request){
    $login = new LoginController();

    $credentials = $request->only('email', 'password');
    $login->authenticate($credentials);
  }
  function loginVendor(Request $request){
    $login = new LoginController();

    $credentials = $request->only('cnpj', 'password');
    $login->authenticate($credentials);
  }
}
