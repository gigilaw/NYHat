<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUser;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserCollection;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): UserCOllection
    {
        return new UserCollection(User::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws Exception
     */
    public function store(StoreUser $request): UserResource
    {
        $validatedData = $request->validated();
        $user = User::create($validatedData)->fresh();

        return new UserResource($user);
    }
}
