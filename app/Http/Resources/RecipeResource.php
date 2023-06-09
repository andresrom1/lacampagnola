<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'slug' => $this->slug,
            'url' => route('recipe.details', $this->slug),
            'tags' => $this->when($this->tags()->count() > 0, function() {
                $tags = [];

                foreach($this->tags()->where('is_special_need_tag', 1)->get() as $tag) {
                    $tags[] = [
                        'title' => $tag->title,
                        'icon_image' => asset($tag->icon_image)
                    ];
                }

                return $tags;
            }),
            'icon_image' => asset($this->icon_image)
        ];
    }
}
