<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\user\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class UserController
 *
 * This class is responsible for handling user-related API requests.
 */
class UserController extends Controller
{
    /**
     * Retrieve a paginated list of users.
     *
     * @param  Request  $request
     * @return UserResource
     */
    public function index(Request $request)
    {
       $users = User::paginate($request->get('pageSize', 10));
       return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request): UserResource
    {
        echo "Hello";
        $user = User::create($request->all());
        return new UserResource($user);
    }
}
