<?php

namespace MbcApiContent\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use MbcApiContent\Models\Page;

class PageContentResource extends JsonResource
{
    /**
     * Indicates if the resource's collection keys should be preserved.
     *
     * @var bool
     */
    public $preserveKeys = true;

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,

            'page_id'    => $this->page_id,
//            'page_id'      => new PageResource(Page::find($this->page_id)),

            'content'    => $this->content,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'page' => new PageResource($this->whenLoaded('page'))
        ];
    }
}
