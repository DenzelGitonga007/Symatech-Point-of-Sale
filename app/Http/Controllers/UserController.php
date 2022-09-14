<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return the users.index
        // return view('users.index', ['slot' => '']); -- trying to work out the "Undefined variable $slot"
        return view('users.index');
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

    
    public function store(Request $request)
    {
        //Save the user details into the db
        // $users = User::create($request->all());
        $users = new User();

            $users->name = $request->name;
            $users->email = $request->email;
            // $users->phone = $request->phone;
            $users->password = bcrypt($request->password);
            // $users->role = $request->role;

            $users->save();

        // To validate successful creation of user
        if ($users) {
            return redirect()->back()->with('success', "User created successfully...their details are in the table below...");
        }
        else {
            return redirect()->back()->with('fail', "User not created successfully!!!");
        }
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
}
