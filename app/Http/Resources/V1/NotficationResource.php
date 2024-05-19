<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\MealResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class NotficationResource extends JsonResource
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
            'id'=>$this->getKey(),

            'title'=>$this->title,
            '   body'=>$this->body,
            'status'=>$this->status

        ];
    }
}
