<?php

namespace App\Http\Controllers\Api\V1;;

use App\Http\Controllers\Controller;
use App\Models\SuperHero;
use App\Http\Requests\StoreSuperHeroRequest;
use App\Http\Requests\UpdateSuperHeroRequest;
use App\Http\Resources\superHeroResource;
use Illuminate\Http\Request;

class SuperHeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/super-heros",
     *     operationId="getsuper-heros",
     *     tags={"SuperHero"},
     *     @OA\Parameter(
     *       name="paginate",
     *       in="query",
     *       description="paginate",
     *       required=false,
     *       @OA\Schema(
     *           title="Paginate",
     *           example="true",
     *           type="boolean",
     *           description="The Paginate data"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortBy",
     *       in="query",
     *       description="turno resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="id",
     *           description="The unique identifier of a turno resource"
     *       )
     *     ),
     *     @OA\Parameter(
     *       name="sortOrder",
     *       in="query",
     *       description="turno resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           example="desc",
     *           description="The unique identifier of a turno resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="perPage",
     *       in="query",
     *       description="Sort order field",
     *       @OA\Schema(
     *           title="perPage",
     *           type="number",
     *           default="10",
     *           description="The unique identifier of a curso resource"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataSearch",
     *       in="query",
     *       description="turno resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="Search data"
     *       )
     *      ),
     *     @OA\Parameter(
     *       name="dataFilter",
     *       in="query",
     *       description="turno resource name",
     *       required=false,
     *       @OA\Schema(
     *           type="string",
     *           description="The unique identifier of a turno resource"
     *       )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Super heros all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {

        $superHeros = SuperHero::filters($request->all())
            ->search($request->all());
        return (superHeroResource::collection($superHeros)->additional(
            [
                'message' => 'Successfully response'
            ],
            200
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuperHeroRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/super-heros",
     *   summary="Creates a new super hero resource",
     *   description="Creates a new super hero resource",
     *   tags={"SuperHero"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/SuperHero")
     *       )
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=200,
     *       description="The Provider resource created",
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response=401,
     *       description="Unauthenticated."
     *   ),
     *   @OA\Response(
     *       @OA\MediaType(mediaType="application/json"),
     *       response="default",
     *       description="an ""unexpected"" error",
     *   )
     * )
     */
    public function store(StoreSuperHeroRequest $request)
    {
        $superHero = new SuperHero();
        $superHero->first_name  = $request->first_name;
        $superHero->last_name = $request->last_name;
        $superHero->nick_name = $request->nick_name;
        $superHero->sex = $request->sex;
        $superHero->publisher_id = $request->publisher_id;
        $superHero->save();

        return (new superHeroResource($superHero))->additional(
            [
                'message' => 'Registered successfully'
            ],
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SettingModel  $settingModel
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *      path="/super-heros/{id}",
     *      operationId="getsuper-herosById",
     *      tags={"SuperHero"},
     *      summary="Get data information",
     *      description="Returns data",
     *   @OA\Parameter(
     *          name="id",
     *          description="SuperHero id",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/SuperHero")
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *   )
     */
    public function show(SuperHero $superHero)
    {
        return (new superHeroResource($superHero))->additional(
            [
                'message' => 'Successfully Response'
            ],
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuperHeroRequest  $request
     * @param  \App\Models\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     *
     * @OA\Put(
     *      path="/super-heros/{id}",
     *      operationId="update-super-hero",
     *      tags={"SuperHero"},
     *      summary="Update existing data",
     *      description="Returns updated  data",
     *  @OA\Parameter(
     *      name="id",
     *      description="Number id of the resource",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\RequestBody(
     *      required=true,
     *      @OA\JsonContent(ref="#/components/schemas/SuperHero")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/SuperHero")
     *   ),
     *   @OA\Response(
     *      response=400,
     *      description="Bad Request"
     *   ),
     *   @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *   ),
     *   @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *   ),
     *   @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *   )
     * )
     */
    public function update(UpdateSuperHeroRequest $request, SuperHero $superHero)
    {
        $superHero->first_name  = $request->first_name;
        $superHero->last_name = $request->last_name;
        $superHero->nick_name = $request->nick_name;
        $superHero->sex = $request->sex;
        $superHero->publisher_id = $request->publisher_id;
        $superHero->update();

        return (new superHeroResource($superHero))->additional(
            [
                'message' => 'Registere updated successfully'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperHero  $superHero
     * @return \Illuminate\Http\Response
     *
     * @OA\Delete(
     *  path="/super-heros/{id}",
     *  operationId="delete-super-hero",
     *  tags={"SuperHero"},
     *  summary="Delete existing data",
     *  description="Deletes a record and returns no content",
     *  @OA\Parameter(
     *      name="id",
     *      description="Return Product id",
     *      required=true,
     *      in="path",
     *      @OA\Schema(
     *          type="integer"
     *      )
     *  ),
     *  @OA\Response(
     *      response=204,
     *      description="Successful operation",
     *      @OA\JsonContent()
     *  ),
     *  @OA\Response(
     *      response=401,
     *      description="Unauthenticated",
     *  ),
     *  @OA\Response(
     *      response=403,
     *      description="Forbidden"
     *  ),
     *  @OA\Response(
     *      response=404,
     *      description="Resource Not Found"
     *  )
     * )
     */
    public function destroy(SuperHero $superHero)
    {
        $superHero->delete();
        return response()->json(
            [
                'status' => 204,
                'message' => 'Resource has been removed'
            ],
            204
        );
    }
}
