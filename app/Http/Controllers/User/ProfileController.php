<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateUserRequest;

class ProfileController extends Controller
{
        
    /**
     * Update Users Profile
     *
     * @param UpdateUserRequest $request [explicite description]
     *
     * @return void
     */
    public function update(UpdateUserRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user()->update($data);

        return redirect()->back()->with('success', 'Profile updated !');
    
    }
}
