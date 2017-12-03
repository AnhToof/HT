<?php

namespace App\Http\Controllers\Api;

use Hash;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show()
    {
        //
        $user = User::find(Auth::user()->id);
        return response()->json($user);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $id = Auth::user()->id;
        $user = User::where('id',$id )->update([
            'fullname' => $request->fullname==""?Auth::user()->fullname:$request->fullname  ,
            'dob' => $request->dob==""?Auth::user()->dob:$request->dob  ,
            'sex' => $request->sex==""?Auth::user()->sex:$request->sex  ,
        ]);
        return response()->json(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $id = Auth::user()->id;
        $user = User::where('id',$id )->update([
            'fullname' => $request->fullname==""?Auth::user()->fullname:$request->fullname  ,
            'dob' => $request->dob==""?Auth::user()->dob:$request->dob  ,
            'sex' => $request->sex==""?Auth::user()->sex:$request->sex  ,
        ]);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required',
        ]);

        $current_password = Auth::user()->password;
        if (Hash::check($request->current_password, $current_password)) {
            User::where('id', Auth::user()->id)->update([
                'password' =>  bcrypt($request->password)
            ]);
            return Response()->json(User::find(Auth::user()->id));
        }

        return Response()->json('error', 400);
    }
}
