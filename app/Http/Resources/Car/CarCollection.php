<?php

namespace App\Http\Resources\Car;

//use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\Resource;

class CarCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'condition' => $this->condition,
            'href'=>[
                'link' => route('cars.show',$this->id)
            ]

        ];
    }
}
