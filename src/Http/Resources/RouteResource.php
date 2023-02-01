<?php

namespace MbcApiContent\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
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
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'method'            => $this->method,
            'protocol'          => $this->protocol,
            'name'              => $this->name,
            'uri'               => $this->uri,
            'pattern'           => $this->pattern,
            'controller_name'   => $this->controller_name,
            'controller_action' => $this->controller_action,
            'path_parameters'   => $this->path_parameters,
            'query_parameters'  => $this->query_parameters,
            'static_uri'        => $this->static_uri,
            'static_doc_name'   => $this->static_doc_name,
            'domain'            => $this->domain,
            'rewrite_rule'      => $this->rewrite_rule,
            'status'            => $this->status,
            'active_start_at'   => $this->active_start_at,
            'active_end_at'     => $this->active_end_at,


            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'page' => new PageResource($this->whenLoaded('page'))
        ];
    }

    public function load()
    {
        $page = $this['page'] ?? null;
        $pageContents = $page ? $page['pageContents'] : null;
    }
}
