<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Laravel\Passport\Client;

class RegisterController extends Controller
{
    use IssueTokenTrait;
    //
    private $client;

    public function __construct()
    {
        $this->client = Client::find(1);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6',
            'fullname' => 'required',
            'dob' => 'required|date',
            'sex' => 'required|boolean'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'fullname' => $request->fullname,
            'dob' => $request->dob,
            'sex' => $request->sex,
        ]);

        return $this->issueToken($request, 'password');
    }
}
