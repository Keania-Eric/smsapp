<?php

namespace App\Http\Requests;

use App\Traits\SanitizeRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    use SanitizeRequest;
    
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', Rule::unique('users')->ignore(Auth::user()->id, 'id')],
            'phone'=> ['required', 'string'],
            'dob'=> ['required', 'string'],
            'anniversary'=> ['required', 'string']
        ];
    }
}
