<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Doctrine\Common\Annotations\Annotation;
use Illuminate\Http\Response;
class AuthController extends Controller
{
/** 
        * @OA\Info(
        *      version="1.0.0",
        *      title="My APIs Documentation"
        *  )
        * @OA\Post(
        * path="/api/register",
        * operationId="Register",
        * tags={"users"},
        * summary="User Register",
        * description="User Register here",
        *     @OA\RequestBody(
        *         @OA\JsonContent(
            
        *               type="object",
        *               required={"name","email", "password", "password_confirmation"},
        *               @OA\Property(property="name", type="text", example="aaa"),
        *               @OA\Property(property="email", type="text", example="aaa@gmail.com"),
        *               @OA\Property(property="password", type="password", example="1234567"),
        *               @OA\Property(property="password_confirmation", type="password", example="1234567")
        *               
        *    ),
        *       
        *    ),
        *      @OA\Response(
        *          response=201,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=200,
        *          description="Register Successfully",
        *          @OA\JsonContent()
        *       ),
        *      @OA\Response(
        *          response=422,
        *          description="Validation error",
        *          @OA\JsonContent(
                     *         @OA\Examples(example="errs", value={"code": 422,"errors":"object of arrays"}, summary="An result object."),

        *),

        *       ),
        *      @OA\Response(response=400, description="Bad request"),
        *      @OA\Response(response=404, description="Resource Not Found"),
        * )
        */
    public function register(RegisterRequest $request){

        $validatedData = $request->validated();
        $user = User::create([
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'password'=>Hash::make($validatedData['password']),
            'remember_token'=> Str::random(10)
        ]);
        $token = $user->createToken('auth_token')->accessToken;

        return response()->json(['token'=>$token,'user'=>$user]);
    }
}

