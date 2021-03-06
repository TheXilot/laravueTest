<?php
/**
 * File AuthController.php
 *
 * @author Tuan Duong <bacduong@gmail.com>
 * @package Laravue
 * @version 1.0
 */
namespace App\Http\Controllers;

use App\Laravue\JsonResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User as UserResource;

/**
 * Class AuthController
 *
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->get('email'),
            'password' =>  $request->get('password'),
        ];
        if ($token = $this->guard()->attempt($credentials)) {
//            return response()->json(new JsonResponse([], 'ok ca passe'), Response::HTTP_UNAUTHORIZED);
            return response()->json(new UserResource(Auth::user()), Response::HTTP_OK)->header('Authorization', $token);
        }
        return response()->json(new JsonResponse([], 'Erreur de connexion verifier votre login ou mot de passe'), Response::HTTP_UNAUTHORIZED);
    }

    public function logout()
    {
        $this->guard()->logout();
        return response()->json((new JsonResponse())->success([]), Response::HTTP_OK);
    }

    public function user()
    {
        return new UserResource(Auth::user());
    }

    /**
     * @return mixed
     */
    private function guard()
    {
        return Auth::guard();
    }
}
