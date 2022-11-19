<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 *   schema="SuperHero",
 *   type="object",
 *   @OA\Property(
 *       property="first_name",
 *       type="string",
 *       required={"true"},
 *       example="name super hero",
 *       description="The name super hero"
 *   ),
 *   @OA\Property(
 *       property="last_name",
 *       type="string",
 *       required={"true"},
 *       example="Last_name super hero",
 *       description="last name of super hero"
 *   ),
 *   @OA\Property(
 *       property="nick_name",
 *       type="string",
 *       required={"true"},
 *      example="super app",
 *       description="The nick_name super hero"
 *   ),
 *   @OA\Property(
 *       property="sex",
 *       type="string",
 *       required={"true"},
 *       description="The sex super hero"
 *   ),
 * @OA\Property(
 *       property="publisher_id",
 *       type="string",
 *       required={"true"},
 *       description="The publisher_id"
 *   ),
 * )
 */
class Publicher extends Base
{
    use HasFactory;

    /**
     * Get all of the superHeros for the Publicher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function superHeros()
    {
        return $this->hasMany(SuperHero::class);
    }
}
