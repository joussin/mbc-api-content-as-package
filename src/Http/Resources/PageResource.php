<?php

namespace MbcApiContent\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'id'            => $this->id,
            'version'       => $this->version,
            'name'          => $this->name,
            'template_name' => $this->template_name,
            'route_id'      => $this->route_id,

            'created_at'    => $this->created_at,
            'updated_at'    => $this->updated_at,
        ];
    }
}
