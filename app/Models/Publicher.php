<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @OA\Schema(
 *   schema="Publicher",
 *   type="object",
 *   @OA\Property(
 *       property="name_publisher",
 *       type="string",
 *       required={"true"},
 *       example="Marvel",
 *       description="The name publisher"
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
