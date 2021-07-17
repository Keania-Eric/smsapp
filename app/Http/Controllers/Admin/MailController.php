<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MailController extends Controller
{
    //

    public function showMailForm()
    {
        return view('admin.mails')
    }
}
