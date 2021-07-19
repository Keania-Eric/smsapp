<?php

namespace App\Http\Controllers\Admin;

use App\Models\MessageDraft;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageDraftController extends Controller
{
    //
    
    /**
     * Show message draft edit form
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function showEditForm(Request $request)
    {
        $drafts = MessageDraft::all();

        return view('admin.draft.edit', ['drafts'=>$drafts]);
    }

    
    /**
     * Update drafts
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function update(Request $request)
    {
        try {
            
            foreach($request->except('_token') as $name=>$text) {

                MessageDraft::where('name', $name)->first()->update(['draft'=>$text]);
            }

            return redirect()->back()->with('success', 'Drafts has been updated');
            
        }catch(\Exception $e) {
            return redirect()->back()->with('failure', $e->getMessage());
        }
    }
}
