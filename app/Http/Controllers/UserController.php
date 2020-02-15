<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.listing')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->can('add.users')){
            //Catch
        }
        $user = new User();
        return view('user.form')->with('user', $user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //second
        $fields = $request->only([
            'username',
            'email']);

        $fields['password'] = bcrypt($request->get('password'));

        $user = User::create($fields);
        // //First
        // User::create([
        //     'username'  => $request->get('username'),
        //     'email'     => $request->get('email'),
        //     'password'  => bcrypt($request->get('password'))
        // ]);
        return redirect()->route('user.index', compact('user'));
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
    public function edit(User $user)
    {
         return view('user.form')->with('user', $user);
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
        $user = User::find($id);
        if($user){
            $fields = $request->only([
                'username',
                'email']);

            $user->update($fields);

            $message = "Edited User";
        } else {
            $message = "user missing";
        }

        return view('user.listing')
            ->with('users', User::all())
            ->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if($user->delete())
        {
            return view('user.listing')
            ->with('users', User::all())
            ->with('message', "User has been deleted");
        } 

        return view('user.listing')
            ->with('users', User::all())
            ->with('message', "User has not been deleted");
    }
}
