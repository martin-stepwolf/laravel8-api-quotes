<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\JsonResource;

class QuotesResource extends JsonResource
{
    /**
     * Transform the resource into an array to show it with many resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (int) $this->id,
            'title' => (string) $this->title,
            'excerpt' => (string) $this->excerpt,
            'author_name' => (string) $this->user->name,
            'rating' => (array) [
                'average' => (float) $this->averageRating(\App\Models\User::class),
                'qualifiers' => (int) $this->qualifiers(\App\Models\User::class)->count(),
            ],
            'updated_ago' => (string) $this->updated_at->diffForHumans()
        ];
    }
}
