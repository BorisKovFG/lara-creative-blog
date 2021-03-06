<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;
use App\Models\Tag;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
//        Category::firstOrCreate(['title' => $data['title']], [
//            'title' => $data['title']
//        ]);
        return redirect()->route('admin.tag.index');
    }
}
