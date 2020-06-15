<?php

namespace App\Http\Controllers;

use BlackBits\LaravelCognitoAuth\Auth\AuthenticatesUsers;
use BlackBits\LaravelCognitoAuth\Auth\RegistersUsers;
use BlackBits\LaravelCognitoAuth\Auth\ResetsPasswords;
use BlackBits\LaravelCognitoAuth\Auth\SendsPasswordResetEmails;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthenticatesUsers, AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
