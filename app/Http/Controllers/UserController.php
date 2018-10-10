<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
    //    $users = User::all();

       $pagination = 5;
    //    $users = User::paginate($pagination);

        $users = User::query();
        if( isset($request->name) AND $request->name != '' )
        {
            $users->where('name', 'LIKE', '%'.$request->name.'%');
        }
        
        $users = $users->paginate($pagination);

       $number = 1;
       if( request()->has('page') && request()->get('page') > 1 ) {
           $number += (request()->get('page') - 1) * $pagination;
       }

       return view('users.index', compact('users', 'number'));
    }

    public function create()
    {
        return view('users.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email',
            'password'  => 'confirmed'
        ]);
        // Cara pertama
        // $request['password'] = bcrypt($request->password);
        // User::create($request->only('name', 'email', 'password'));

        // Cara kedua
        $user = new User();
        $user->name     = $request->name;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('users.index');
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
        // GET data by id
        $user["user"] = User::find($id);
        // Return view
        return view('users.edit', compact('user'));
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
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users,email,'.$id,
            'password'  => 'confirmed'
        ]);

        User::where('id', '=', $id)->update($request->only('name', 'email', 'password'));
        return redirect()->route('users.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', '=', $id)->delete();

        return redirect()->route('users.index');
    }
}
