<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'title' => $this->title,
            'content' => $this->content,
            'image' => $this->image,
            'slug' => $this->slug,
            'user_id' => $this->user_id,
            'issue_id' => $this->issue_id,
            'user' => new UserResource($this->user),
            'issue' => $this->issue,
            'answers' => $this->answers->count() > 0 ? AnswerResource::collection($this->answers) : [],
            
        ];
    }
}
