<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\users\EditRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.listusers')
        ->with('users', User::all())
        ->with('all_categories', Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CreateRequest $request)
    {
        if ($request->isMethod('head')) {
            $request->flash();

            $is_admin = false;
            if ($request['is_admin']) {
                $is_admin = true;
            }
         
            $insertid = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' =>  Hash::make($request['password']),
                'is_admin' => $is_admin,
            ])->id;
            return redirect()->route('users.index');
        } else {
            return view('admin.users.create')
            ->with('all_categories', Category::all());
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $oneuser =  User::where('id', $user)->get();
        foreach ($oneuser as $item_user) {
            $user_id =  $item_user['id'];
        }
        if (!empty($user_id )) {
            return view('admin.users.edituser')
            ->with('user', $item_user)
                ->with('all_categories', Category::all());
        } else {
            return view('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, $user)
    {
        if ($request->isMethod('put')) {
            $user_for_update = User::find($request['id']);
            $user_for_update->name = $request['name'];
            $user_for_update->email = $request['email'];
            $user_for_update->password = Hash::make($request['password']);

            if ($request['is_admin']) {
                $user_for_update->is_admin = true;
            } else {
                $user_for_update->is_admin = false;
            }

            $user_for_update->save();
        }
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $user)
    {
        if ($request->isMethod('delete')) {
            User::where('id', $user)->delete();
        }
       /* return view('admin.users.listusers')
        ->with('users', User::all())
        ->with('all_categories', Category::all());
        */
        return redirect()->route('users.index');
    }
}
