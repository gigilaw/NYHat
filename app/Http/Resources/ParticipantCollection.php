<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ParticipantCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($user) {
                $array = [
                    'id' => $user->id,
                    'name' => $user->name,
                    'nick_name' => $user->nick_name,
                    'email' => $user->email,
                    'height' => $user->height,
                    'age' => $user->age,
                    'position' => $user->position,
                    'throwing' => $user->throwing,
                    'catching' => $user->catching,
                    'speed' => $user->speed,
                    'offense' => $user->offense,
                    'defense' => $user->defense,
                    'payment' => $user->payments,
                ];
                return $array;
            })
        ];
    }
}
