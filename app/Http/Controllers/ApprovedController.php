<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Validator;

class ApprovedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(9);

        return view('users.approved', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(array $data)
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
    public function edit(Request $request, $id)
    {

        User::where('id', $id)->update([
            'fullname' => $request->fullname,
            'dob' => $request->dob,
            'sex' => $request->sex
        ]);
        $request->session()->flash('alert-success', 'Đã sửa tài khoản thành công');
        return redirect('approved');
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

        User::where('id', $id)->update(
            $request->all()
        );
        return redirect('approved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //

        User::where('id', $id)->delete();
        $request->session()->flash('alert-success', 'Đã xóa tài khoản thành công');
        return redirect('approved');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fullname' => 'required|string|max:255',
            'dob' => 'required|date',
            'sex' => 'required|boolean',
            'status' => 'required|boolean',
        ]);
    }

    public function showUser(User $user)
    {
        return response()->json($user, 200);
    }

    public function storeUser(Request $request)
    {
        $user = User::create([
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'fullname' => $request->fullname,
            'dob' => $request->dob,
            'sex' => $request->sex,
            'status' => 0,
            'isAdmin' => 0,
        ]);
        return response()->json($user, 201);

    }

    public function updateUser(Request $request, User $user)
    {
        $user->update([
            'fullname' => $request->fullname,
            'dob' => $request->dob,
            'sex' => $request->sex,
        ]);
        return response()->json($user, 200);
    }

}
