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
            '*.status' => 'in:' . implode(',', Payment::$status),
            '*.form_of_payment' => 'required_if:*.status,paid|in:' . implode(',', Payment::$formOfPayment),
            '*.paid_at' => 'required_if:*.status,paid|date_format:Y-m-d|before:tomorrow',
            '*.note' => 'string|nullable',
        ];
    }
}
