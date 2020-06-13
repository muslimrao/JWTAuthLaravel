<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	
	public function login(Request $request )
	{
		$credentials = $request->only('email', 'password');
		
		if ($token = auth()->attempt($credentials)) {
            return  response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
	}
	
	
	public function register(Request $request )
	{
		var_dump( auth()->user() );die;
		die;
		if (array_key_exists("email", $request->toArray()) and array_key_exists("password", $request->toArray()) and array_key_exists("name", $request->toArray()) ) {
			$user = new User;
			$user->name = $request->name;
			$user->email = $request->email;
			$user->password = bcrypt( $request->password );
			$user->save();
			
            return  response()->json(['data' => ["message"		=> "You are registered successfully"]]);
        }

        return response()->json(['error' => 'Please provide Name, Email and Password'], 401);
	}
	
	
	public function whoami()
	{
		if ( auth()->user() )
		{
			 return  response()->json(['data' => ["message"		=> auth()->user()]]);
		}
		
		return response()->json(['error' => 'Please login first'], 401);
	}
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
