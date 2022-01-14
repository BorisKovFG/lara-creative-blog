<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Service\PostService;
use App\Service\UserService;

class BaseController extends Controller
{
    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
