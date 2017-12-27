<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserManageController extends Controller
{
    public function users()
    {
        $users=User::orderBy('name')->paginate(10);
        return view('admin.users.home',['users'=>$users]);
    }
    public function usersEdit($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.edit',['user'=>$user]);
    }
    public function usersUpdate(Request $request, $id)
    {
        $user=User::findOrFail($id);
        $user->update([
            'name'=> $request['name'],
            'email'=>$request['email'] ,
            'DOB'=>$request['birthday'],
            'address'=> $request['address'],
            'gender'=>$request['gender'],

        ]);
        $user=User::findOrFail($id);
        return view('admin.users.show',['user'=>$user])->with('Success','Users profile updated successfully   ');
    }
    public function usersShow($id)
    {
        $user=User::findOrFail($id);
        return view('admin.users.show',['user'=>$user]);
    }
    public function usersCreate()
    {
        return view('admin.users.create');
    }
    public function usersStore(Request $request)
    {
        $user= New User();
        $user->fill([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'DOB'=>$request['birthday'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'balance'=>rand(0,1000),
            'password'=>\Hash::make('123456'),
        ]);
        $user->save();
        return redirect()->route('admin.users')
            ->with('success','Student profile created successfully ');

    }

    public function storeAdmin(Request $request)
    {
        $admin=New Admin();
        $admin->fill([
            'name' =>$request['name'],
            'email'=>$request['email'],
            'DOB'=>$request['birthday'],
            'gender'=>$request['gender'],
            'address'=>$request['address'],
            'password'=>\Hash::make('123456'),
        ]);
        $admin->save();
        return redirect()->route('admin.home');
    }

    public function usersSearch()
    {
        $user = User::where(DB::raw('LOWER("name")'), 'like', '%'.strtolower(request()->name).'%')->orderBy('name')->paginate(10);

        return view('admin.users.home', ['users' => $user]);
    }

    public function usersDestroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users');
    }


}
