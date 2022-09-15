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

        // Fetching the users from the db
        $users = User::paginate(6); //Display 5 records
        //Return the users.index
        return view('users.index', ['users' => $users]);
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
            $users->role = $request->role;

        $users->save();

        // To validate successful creation of user
        if ($users) {
            return redirect()->back()->with('user_create_success', "User created successfully...their details are in the table below...");
        }
        else {
            return redirect()->back()->with('user_create_fail', "User not created successfully!!!");
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //Update the user details
        $users = User::find($id);
        // To check if user is found
        if (!$users) {
            return back()->with('edit_error', "User not found!");
        }
        $users->role = $request->input('role'); //To capture the role input field

        $users->update($request->all());
        return back()->with('edit_success', "User updated successfully...");
        
    }

    public function destroy($id)
    {
        //Delete the user details
        $users = User::find($id);
        // To check if user exists
        if (!$users) {
            return back()->with('delete_error', "User not found!");
        }
        else {
            $users->delete();
            return back()->with('delete_success', "User deleted successfully...");
        }
    }
}
