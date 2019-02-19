<?php

namespace App\Http\Resources\Car;

use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'name' => $this->name,
            'state' => $this->state,
            'yearOfissue' => $this->yearOfissue,
            'free' => $this->free,
            'start_route_at' => $this->start_route_at,
            'finish_route_at' => $this->finish_route_at,
            'start_repairs_at' => $this->start_repairs_at,
            'finish_repairs_at' => $this->finish_repairs_at

        ];
    }
}
