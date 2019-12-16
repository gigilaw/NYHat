<?php

namespace App\Http\Controllers\API;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePayment;
use App\Http\Resources\PaymentCollection;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): PaymentCOllection
    {
        return new PaymentCollection(Payment::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePayment $request): PaymentCollection
    {
        $validatedData = $request->validated();

        foreach ($validatedData as $payment) {
            $updates =[];

            if (isset($payment['status'])) {
                $updates['status'] = $payment['status'];
            }
            if (isset($payment['form_of_payment'])) {
                $updates['form_of_payment'] = $payment['form_of_payment'];
            }
            if (isset($payment['paid_at'])) {
                $updates['paid_at'] = $payment['paid_at'];
            }

            Payment::where('id', $payment['id'])->update($updates);

            if (isset($payment['note'])) {
                $tournamentUser = Payment::find($payment['id'])->tournamentUser;
                $tournamentUser->note = $payment['note'];
                $tournamentUser->save();
            }
        }

        return new PaymentCollection(Payment::all());
    }
}
