<?php

namespace App\Http\Controllers\Admin;

use App\Models\SMSLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SMSLogController extends Controller
{
    //

    public function logs(Request $request)
    {
        $logs = SMSLog::latest()->get();

        return view('admin.logs.sms', ['logs'=> $logs]);
    }
}
