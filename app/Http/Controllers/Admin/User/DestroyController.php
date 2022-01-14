<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class DestroyController extends BaseController
{
    public function __invoke(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.user.index');
    }
}
