<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Models\User;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
//        $data = $request->validated();
//        User::firstOrCreate($data);
//        Category::firstOrCreate(['title' => $data['title']], [
//            'title' => $data['title']
//        ]);
        return redirect()->route('admin.user.index');
    }
}
