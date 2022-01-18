<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\StoreRequest;
use App\Models\Category;
use App\Models\Comment;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Comment::firstOrCreate($data);
//        Category::firstOrCreate(['title' => $data['title']], [
//            'title' => $data['title']
//        ]);
        return redirect()->route('personal.comment.index');
    }
}
