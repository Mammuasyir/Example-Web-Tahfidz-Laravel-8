<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $jumlahUser = User::where('role', 'User')->count();
        return view('user.content.index',[
        'jumlahUser' => $jumlahUser,
        'user' => $user,
        ]);
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
        User::create([
            'name'             => $request->name,
            'username'         => $request->username,
            'email'            => $request->email,
            'role'             => 'User',
            'password'         => Hash::make($request->password),
        ]);

        return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $title = "My Profile";
        $user = User::where('username', $username)->first();
        return view('user.content.show', [
        'user' => $user,
        'title' => $title,
        
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = "Edit Profile";
        $user = User::where('username', $username)->first();
        return view('user.content.index', [
        'user' => $user,
        'title' => $title,
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        // return dd($request);
        $title = "My profile";

        if(empty($request->file('image'))){
            $user = User::where('username', $username)->first();
            $user->update([
                'role'           => $request->role,
                'name'           => $request->name,
                'email'          => $request->email,
                'username'       => $request->username,
                'number_phone'   => $request->number_phone,
                'address'        => $request->address
            ]);
            return redirect()->back()->with('success', 'Profile berhasil diupdate !');
        }
        else{
            $user = User::where('username', $username)->first();
            
            $user->update([ 
            'role'           => $request->role,
            'name'           => $request->name,
            'email'          => $request->email,
            'username'       => $request->username,
            'number_phone'   => $request->number_phone,
            'address'        => $request->address,
            'image'             => $request->file('image')->store('image-user')
        ]);
        return redirect()->back()->with('success', 'Profile berhasil diupdate !');

        }
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

    public function tableuser()
    {
        if (auth()->user()->role !== 'Admin') {
            abort(403);
        }
        $user = User::all();
        return view('user.content.tableuser', compact('user'));
    }

    public function delUser($id)
    {
        $user = User::where('id', $id)->first();
        Storage::delete($user->image);
        User::findOrFail($id)->delete();
        return redirect()->back()->with('failed','Data Pengguna Berhasil Dihapus!');
    }
}
