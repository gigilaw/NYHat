<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PaymentCollection extends ResourceCollection
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
            'data' => $this->collection->transform(function ($payment) {
                $array = [
                    'id' => $payment->id,
                    'status' => $payment->status,
                    'form_of_payment' => $payment->form_of_payment,
                    'reference_code' => $payment->reference_code,
                    'paid_at' => $payment->paid_at,
                    'tournament' => $payment->tournamentUser,
                    'created_at' => $payment->created_at,
                    'updated_at' => $payment->updated_at,
                    'deleted_at' => $payment->deleted_at,
                ];
                return $array;
            })
        ];
    }
}
