<?php

namespace App\Dao\Auth;

use App\Contracts\Dao\Auth\AuthDaoInterface;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

/**
 * Interface for Data Accessing Object of task
 */
class AuthDao implements AuthDaoInterface
{
    /**
     * To login
     * @param Request $request request with inputs
     * @return Object saved login
     */
    public function postAuth($request)
    {
        return $request->only('email', 'password');
    }

    /**
     * To register
     * @param Request $request request with inputs
     * @return Object  saved register
     */
    public function registerAuth($request)
    {
        $data = $request->all();
        $check = $this->create($data);
        return $check;
    }

    /**
     * To create
     * @param Request $request request with inputs
     * @return Object create
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
}