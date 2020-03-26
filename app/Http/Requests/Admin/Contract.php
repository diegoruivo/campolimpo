<?php

namespace CampoLimpo\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Contract extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service' => 'required',
            'user' => 'required',
            'contract_price' => 'required',
            'pay_day' => 'required',
            'deadline' => 'required',
            'start_date' => 'required',
        ];
    }
}
