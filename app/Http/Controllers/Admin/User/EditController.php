<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends BaseController
{
    public function __invoke(Category $category)
    {
        return view('admin.users.edit', compact('category'));
    }
}
