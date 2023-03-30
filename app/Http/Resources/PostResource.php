<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "user_id"=>$this->user_id,
            "titles"=>$this->titles,
            "content"=>$this->content,
            "image_path"=>$this->image_path,
            "published_date"=>$this->published_date,
            "views_count"=>$this->views_count,
            "likes_count"=>$this->likes_count,
            "comments_count"=>$this->comments_count,
            "category"=>$this->category,
            "tag"=>$this->tag,
        ];
    }
}
