<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $users = User::all();
        return view('data-admin.data-users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        return view('data-admin.data-users.create', compact('users'));
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
        $validator = $request->validate([
                'password' => 'required',
                'name' => 'required|max:150',
                'email' => 'required|email',
                'role' => 'required'
            ]);

        if($this->validasi->fails()){
            Alert::warning('Gagal', 'Masukan Data Dengan Benar!');
            return back();
        }

        $user = new User;
        $user->role = $request->role;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(40);
        $user->save();

        Alert::success('Berhasil', 'Tambah Data Berhasil!');
        return redirect('/dashboard-user');
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
    public function edit($id)
    {
        //
        $user =  User::find($id);
        return view('data-admin.data-users.edit', compact('user'));
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
        $validator = $request->validate([
            'name' => 'required|max:150',
            'email' => 'required|email',
            'role' => 'required'
        ]);

        if($this->validasi->fails()){
            Alert::warning('Gagal', 'Masukan Data Dengan Benar!');
            return back();
        }
        
        $user = User::find($id);
        
        if(!empty($request->password)){

            $data = [
                'name' => $request['name'],
                'email' => $request['email'],
                'role' => $request['role'],
                'password' => bcrypt($request['password'])
            ];

            $user->update($data);
        }

        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => $request['role']
        ];

        $user->update($data);

        Alert::success('Berhasil', 'Update Data Berhasil!');
        return redirect('/dashboard-user');

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
        $user = User::find($id);
        $user->delete();
        Alert::success('Berhasil', 'Hapus Data Berhasil');
        return redirect('/dashboard-user');
    }
}
