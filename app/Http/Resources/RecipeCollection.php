<?php

namespace App\Http\Resources;

use App\Models\Recipe;
use App\Http\Resources\RecipeResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $this->collection->transform(function (Recipe $recipe) {
            return (new RecipeResource($recipe));
        });

        return parent::toArray($request);
    }
}
