<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportRequest extends FormRequest
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
        $res = [];
        if ($this->method() == 'POST') {
                $res['title'] = 'required|string';
        } else {
            $res['title'] = 'sometimes|string';
        }
        $res['content'] = 'sometimes|string';
        $res['image'] = 'sometimes|string';

        return $res;
    }
}
