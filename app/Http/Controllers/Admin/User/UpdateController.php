<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category)
    {
//        $data = $request->validated();
//        $category->update($data);
        return redirect()->route('admin.user.show', compact(''));
    }
}
