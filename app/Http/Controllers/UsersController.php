<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
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

        return $users;

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
        $users = Courses::find($id);

        if(is_null($users)){
            return response()->json('No se pudo realizar la peticion', 404);
        }else{
            return ('Succefull Deleted');
        }
        $users->delete();
        return response()->noContent();
    }
}
