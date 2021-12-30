<?php

namespace App\Services\Auth;

use Illuminate\Http\Request;
use App\Contracts\Dao\Auth\AuthDaoInterface;
use App\Contracts\Services\Auth\AuthServiceInterface;

/**
 * Service class for auth.
 */
class AuthService implements AuthServiceInterface
{
    /**
     * auth dao
     */
    private $authDao;

    /**
     * Class Constructor
     * @param AuthDaoInterface
     */
    public function __construct(AuthDaoInterface $authDao)
    {
        $this->authDao = $authDao;
    }

    /**
     * To login
     * @param Request $request request with inputs
     * @return Object  saved login
     */
    public function postAuth($request)
    {
        return $this->authDao->postAuth($request);
    }

    /**
     * To register
     * @param Request $request request with inputs
     * @return Object  saved register
     */
    public function registerAuth($request)
    {
        return $this->authDao->registerAuth($request);
    }
}
