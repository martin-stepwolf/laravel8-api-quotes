<?php

namespace App\Http\Controllers\Api\V2;

use App\Models\Quote;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\V2\UserQuotesResource;
use App\Http\Resources\V2\UserResource;

class UserController extends Controller
{
    public function index()
    {
        $data = UserResource::collection(User::withCount('quotes')->paginate(5));
        return $data;
    }

    public function show(User $user)
    {
        $user->quotes_count = count($user->quotes);
        return new UserResource($user);
    }

    public function index_quotes(User $user)
    {
        $data = UserQuotesResource::collection(Quote::where('user_id', $user->id)->paginate(6));
        return $data;
    }
}
