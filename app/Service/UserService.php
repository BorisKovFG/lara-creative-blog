<?php

namespace App\Service;

use App\Http\Requests\Admin\User\UpdateRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserService
{
    public function store($data)
    {
//        $data['password'] = Hash::make($data['password']);
        StoreUserJob::dispatch($data);
    }

    public function update($data, User $user)
    {
       $user->update($data);
    }
}
