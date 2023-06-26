<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostHasLike;

/**
 * Class FrontendPostController
 */


class FrontendPostController extends Controller
{

    /**
     * @OA\Get(
     *      path="/api/post/like/{postId}",
     *      operationId="updateLikesOfPost",
     *      tags={"Post"},
     *      summary="Like or unlikes the post",
     *      description="Succesfully likes or unlikes the post",
     *      security={{"bearer_token":{}}},
     *      @OA\Parameter(name="postId", in="path", description="Post ID", required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(response=200, description="successful operation",
     *          @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="status", type="boolean", example="true"),
     *                  @OA\Property(property="msg", type="string", example="Successfully liked the post"),
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthorized",
     *     @OA\MediaType(
     *              mediaType="application/json",
     *              @OA\Schema(
     *                  @OA\Property(property="message", type="string", example="Unauthenticated."),
     *              )
     *          )
     *       ),
     *     )
     */
    public function likePost(Post $post){
        try{

            $checkLike = PostHasLike::where('user_id', auth()->user()->id)
                                    ->where('post_id', $post->id)->first();
            if($checkLike){
                //unlike
                $checkLike->delete();
                return response()->json([
                    'status' => true,
                    'msg' => 'Successfully unliked the post'
                    ],200);
            }else{
                //like
                PostHasLike::create([
                   'post_id' => $post->id,
                   'user_id' => auth()->user()->id
                ]);
                return response()->json([
                    'status' => true,
                    'msg' => 'Successfully liked the post'
                ],200);
            }
        }catch(\Exception $ex){

        }
    }
}
