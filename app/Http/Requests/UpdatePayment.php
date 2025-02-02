<?php

namespace App\Http\Requests;

use App\Models\Payment;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePayment extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            '*.id' => 'required|numeric|exists:payments,id',
            '*.status' => 'in:' . implode(',', Payment::$status) . '|nullable',
            '*.form_of_payment' => 'in:' . implode(',', Payment::$formOfPayment) . '|nullable',
            '*.paid_at' => 'date_format:Y-m-d|before:tomorrow|nullable',
            '*.note' => 'string|nullable',
        ];
    }
}
