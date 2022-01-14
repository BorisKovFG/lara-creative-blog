<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }
}
