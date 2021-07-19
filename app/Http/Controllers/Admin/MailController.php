<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\SentMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\Admin\MailNotification;

class MailController extends Controller
{
    
    /**
     * Method showMailForm
     *
     * @return void
     */
    public function showMailForm()
    {
        $users = User::all();
        return view('admin.mails.compose', ['users'=> $users]);
    }

    
    /**
     * Method sendMail
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function sendMail(Request $request)
    {
        try {

            $message = $request->message;
            $subject = $request->subject;
            $emails = User::whereIn('id', $request->users)->get('email')->pluck('email')->toArray();

            DB::beginTransaction();

            // Save as sent mails
            SentMail::create([
                'subject'=> $subject,
                'message'=> $message,
                'emails'=> json_encode($emails)
            ]);

            foreach($request->users as $userID) {
                $user = User::find($userID);
                $user->notify(new MailNotification($subject, $message));
            }

            DB::commit();

            return redirect()->back()->with('success', 'Mail has been sent');
            
        }catch(\Exception $e) {

            DB::rollback();

            return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
