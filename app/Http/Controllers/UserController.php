<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
public function index()
{
$users = User::paginate(10);
return view('content.users.index', compact('users'));
}
}
