<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Importer;

class UserController extends Controller
{

    private $importer;

    public function __construct(Importer $importer)
    {
        $this->importer = $importer;
    }
    
    /**
     * Method showUsers
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function showUsers(Request $request)
    {
        $users = User::all();
        return view('admin.user.index', ['users'=> $users]);
    }

    
    /**
     * Method store
     *
     * @param CreateUserRequest $request [explicite description]
     *
     * @return void
     */
    public function store(CreateUserRequest $request)
    {
        try {

            $data  = $request->getSanitized();

            $user = User::create($data);

            return redirect()->back()->with('success', 'User Added Successfully');

        }catch(\Exception $e) {

            return redirect()->back()->with('failure', $e->getMessage());   
        }
    }
    
    /**
     * Method showEditForm
     *
     * @param Request $request [explicite description]
     * @param User $user [explicite description]
     *
     * @return void
     */
    public function showEditForm(Request $request, User $user)
    {
        return view('admin.user.edit', ['user'=> $user]);
    }
    
        
    /**
     * Method update
     *
     * @param UpdateUserRequest $request [explicite description]
     * @param User $user [explicite description]
     *
     * @return void
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        try {
      
            $data  = $request->getSanitized();

            $user = $user->update($data);

            return redirect()->back()->with('success', 'User Updated Successfully');

        }catch(\Exception $e) {

            return redirect()->back()->with('failure', $e->getMessage());   
        }
    }

    
    /**
     * Method destory
     *
     * @param Request $request [explicite description]
     * @param User $user [explicite description]
     *
     * @return void
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return redirect()->back()->with('success', 'User Delete Successfully');
    }

    
    /**
     * Method UploadUsers
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function uploadUsers(Request $request)
    {
        try {
            
            $this->importer->import(new UsersImport, $request->file('users'));

            return redirect()->back()->with('success', 'User Uploaded Successfully');

        }catch(\Exception $e) {

            return redirect()->back()->with('failure', $e->getMessage());   
        }
    }


}
