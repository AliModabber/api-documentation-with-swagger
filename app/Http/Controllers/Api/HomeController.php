<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Doctrine\Common\Annotations\Annotation;
use App\Models\User;
class HomeController extends Controller
{

    /**
     * 
     * @OA\Get(
     * path="/api/users/",
     * summary="Get all users",
     * tags={"users"},
     *  @OA\Response(
     *          response=200,
     *          description="all users",
     *          @OA\JsonContent(
     *            @OA\Property(property="users", type="text"),
     *                   )
     *               ),
     *             
     *  @OA\Response(response=400, description="Bad request"),
     *  @OA\Response(response=404, description="Resource Not Found"),
     *  ),
     */
    public function users()
    {
        $users = User::all();
        return response()->json(['users'=>$users]);
    }
}
