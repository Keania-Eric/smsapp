<?php

namespace App\Http\Requests\Admin;

use App\Traits\SanitizeRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{

    use SanitizeRequest;
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> ['required', 'string'],
            'phone'=> ['required', 'string'],
            'email'=> ['required', 'string'],
            'dob'=> ['required', 'string'],
            'anniversary'=> ['required', 'string']
        ];
    }

    
    /**
     * Method getSanitized
     *
     * @return array
     */
    public function getSanitized()
    {
        $data = $this->validated();

        $data['password'] = bcrypt($data['phone']);

        return $data;
    }
}
