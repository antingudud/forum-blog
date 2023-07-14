<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResouce extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->idpost,
            'UID' => $this->authorID,
            'title' => $this->title,
            'content' => $this->content,
            'url' => $this->url,
            'created' => $this->create_time,
            'updated' => $this->update_time
        ];
    }
}
