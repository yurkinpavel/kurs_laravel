<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Account\EditRequest;


class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('account.index')
         ->with('all_categories', Category::all());
    }


    public function update(EditRequest $request)
    {

        if ($request->isMethod('post') && $request['id'] == Auth::user()->id ) {
            $user_for_update = User::find($request['id']);
            $user_for_update->name = $request['name'];
            $user_for_update->email = $request['email'];
            if(!empty($request['password'])){
                $user_for_update->password = Hash::make($request['password']);  
            }
               $user_for_update->save();
        }
        return redirect()->route('account.index');
    }
}
