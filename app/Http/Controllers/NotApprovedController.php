<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class NotApprovedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(9);
        return view('users.notapproved', compact('users'));
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = User::where('email', '=', $request->get('email'))->first();
        if ($user == null) {
            $user = new User;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->fullname = $request->fullname;
            $user->dob = $request->dob;
            $user->sex = $request->sex;
            $user->status = 0;
            $user->isAdmin = 0;


            $user->save();
            $request->session()->flash('alert-success', 'Đã tạo tài khoản thành công');
            return redirect('notapproved');
        }
        $request->session()->flash('alert-danger', 'Tài khoản đã tồn tại');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        User::where('id', $id)->update(['status' => 1]);
        $request->session()->flash('alert-success', 'Đã cấp phép tài khoản thành công');
        return redirect('approved');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        User::where('id', $id)->update(['status' => 1]);
        $request->session()->flash('alert-success', 'Đã cấp phép tài khoản thành công');
        return redirect('approved');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        User::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Đã xóa tài khoản thành công');
        return redirect('notapproved');
    }
}
