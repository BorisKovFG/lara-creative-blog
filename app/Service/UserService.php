<?php

namespace App\Service;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{
    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        User::firstOrCreate(['email' => $data['email']], $data);
    }

    public function update($data, User $user)
    {
       $user->update($data);
    }
}
