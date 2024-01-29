<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        return $data;
    }

    public function toResponse($request)
    {
        $data = parent::toResponse($request);
        $content = json_decode($data->getContent());
        return [
            'success' => $content->meta->success,
            'page'       => $content->meta->page,
            'total_pages'     => $content->meta->total_pages,
            'total_users' => $content->meta->total_users,
            'count'  => $content->meta->count,
            'links' => [
                'next_url' => $content->meta->links->next_url,
                'prev_url' => $content->meta->links->prev_url
            ],
            'users' => $content->meta->users,
        ];
    }
}
