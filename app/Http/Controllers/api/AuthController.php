<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class AuthController
 */
class AuthController extends Controller
{

    /**
     * @OA\Post(
     *      path="/api/login",
     *      operationId="login",
     *      tags={"Auth"},
     *      summary="Login User",
     *      description="Succesfully logs in and returns Bearer Token",
     *      security={{"bearer_token":{}}},
     *      @OA\RequestBody(
     *          @OA\MediaType(mediaType="application/json",
     *               @OA\Schema(ref="#/components/schemas/AuthLoginRequest")
     *         )
     *      ),
     *      @OA\Response(response=200, description="successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="accessToken", type="string", example="accessToken"),
     *                  @OA\Property(property="msg", type="string", example="Login Successfull"),
     *              )
     *          )
     *      ),
     *     )
     */
    public function login(AuthLoginRequest $request){
        try{
            $user = User::where('email', $request->email)->first();
            $checkHash = Hash::check($request->password, $user->password);
            if($checkHash){
                $accessToken = $user->createToken('API Token')->accessToken;
                return response()->json([
                                    'accessToken'=> $accessToken,
                                    'msg' => 'Login Successfull'
                                 ], 200);
            }else{
                return response()->json(['msg' => 'Invalid Login Credentials'], 400);
            }
        }catch(Exception $ex){
            return $ex;
        }
    }

}
