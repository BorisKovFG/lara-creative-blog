<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    public function __invoke(User $user)
    {
//        $category = Category::findOrFail($category);
        return view('admin.users.show', compact('user'));
    }
}