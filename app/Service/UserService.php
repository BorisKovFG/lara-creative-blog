<?php

namespace App\Service;

use App\Http\Requests\Admin\User\UpdateRequest;
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
        $password = Str::random(6);
        $data['password'] = Hash::make($password);
        $user = User::firstOrCreate(['email' => $data['email']], $data);
        Mail::to($data['email'])->send(new PasswordMail($password));
        event(new Registered($user));
    }

    public function update($data, User $user)
    {
       $user->update($data);
    }
}
