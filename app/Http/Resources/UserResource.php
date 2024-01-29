<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function toResponse($request)
    {
        $data = parent::toResponse($request);
        $content = json_decode($data->getContent());
        $newContent = [];
        $newContent['success'] = true;
        $newContent['user'] = $content->data;
        $data->setContent(json_encode($newContent));
        return $data;
    }
}
