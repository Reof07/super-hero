<?php



namespace App\Http\Controllers\Api\V1;;

use App\Http\Controllers\Controller;
use App\Models\Publicher;
use App\Http\Requests\StorePublicherRequest;
use App\Http\Requests\UpdatePublicherRequest;
use App\Http\Resources\publicherResource;
use Illuminate\Http\Request;

class PublicherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * @OA\Get(
     *     path="/publishers",
     *     operationId="getpublicher",
     *     tags={"Publicher"},
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
     *         description="Publicher all."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="error."
     *     )
     *  )
     */
    public function index(Request $request)
    {
        $publicher = Publicher::filters($request->all())
            ->search($request->all());
        return (publicherResource::collection($publicher)->additional(
            [
                'message' => 'Successfully Response'
            ],
            200
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePublicherRequest  $request
     * @return \Illuminate\Http\Response
     *
     * @OA\Post(
     *   path="/publishers",
     *   summary="Creates a new publicher resource",
     *   description="Creates a new publicher resource",
     *   tags={"Publicher"},
     *   security={{"passport": {"*"}}},
     *   @OA\RequestBody(
     *       @OA\MediaType(
     *           mediaType="application/json",
     *           @OA\Schema(ref="#/components/schemas/Publicher")
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
    public function store(StorePublicherRequest $request)
    {
        $publicher = new Publicher();
        $publicher->name_publisher = $request->name_publisher;
        $publicher->save();
        return (new publicherResource($publicher))->additional(
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
     *      path="/publishers/{id}",
     *      operationId="getpublisherById",
     *      tags={"Publicher"},
     *      summary="Get data information",
     *      description="Returns data",
     *   @OA\Parameter(
     *          name="id",
     *          description="Publisher",
     *          required=true,
     *          in="path",
     *             @OA\Schema(type="integer")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Publicher")
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
    public function show(Publicher $publisher)
    {
        return (new publicherResource($publisher))->additional(
            [
                'message' => 'Successful Response'
            ],
            200
        );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePublicherRequest  $request
     * @param  \App\Models\Publicher  $publicher
     * @return \Illuminate\Http\Response
     *
     *  @OA\Put(
     *      path="/publishers/{id}",
     *      operationId="update-publisher resource",
     *      tags={"Publicher"},
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
     *      @OA\JsonContent(ref="#/components/schemas/Publicher")
     *   ),
     *   @OA\Response(
     *      response=200,
     *      description="Successful operation",
     *      @OA\JsonContent(ref="#/components/schemas/Publicher")
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
    public function update(UpdatePublicherRequest $request, Publicher $publisher)
    {
        $publisher->name_publisher = $request->name_publisher;
        $publisher->update();
        return (new publicherResource($publisher))->additional(
            [
                'message' => 'Registered updated successfully'
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publicher  $publicher
     * @return \Illuminate\Http\Response
     *
     *@OA\Delete(
     *  path="/publishers/{id}",
     *  operationId="delete-publisher",
     *  tags={"Publicher"},
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
    public function destroy(Publicher $publisher)
    {
        $publisher->delete();
        return response()->json([
            'message' => 'Register has been deleted'
        ]);
    }
}
