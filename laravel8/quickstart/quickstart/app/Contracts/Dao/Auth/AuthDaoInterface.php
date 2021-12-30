<?php

namespace App\Contracts\Dao\Auth;

use Illuminate\Http\Request;

/**
 * Interface for Data Accessing Object of auth
 */
interface AuthDaoInterface
{
    /**
     * To login
     * @param Request $request request with inputs
     * @return Object  saved login
     */
    public function postAuth($request);


    /**
     * To register
     * @param Request $request request with inputs
     * @return Object saved register
     */
    public function registerAuth($request);
}