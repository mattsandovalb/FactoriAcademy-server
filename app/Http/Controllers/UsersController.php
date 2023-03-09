<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function me()
    {
        return response()->json([
            'status' => true,
            'user' => new UserResource(auth()->user()),
            
        ]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users =  User::all();

        return response()->json([
            'status' => true,
            'users' => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $users = new User();

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            
        ]);

        $users->name = $request->name;
        $users->email = $request->email;
        

        $users->save();

        return response()->json([
            'status' => true,
            'messages' => 'User Created Successfully',
            'users' => $users
        ], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $users, $id)
    {
        $users = User::find($id);
        return $users;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users, $id)
    {
        $users = User::find($id);

        $users->name = $request->name;
        $users->email = $request->email;
       

        $users->update();

        return $users;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $users, $id)
    {
        $users = User::find($id);

        if(is_null($users)){
            return response()->json('No se pudo realizar la peticion', 404);
        }else{
            $users->delete();
            return response()->noContent();
            return ('Successful Deleted');
        }
    }
    }
