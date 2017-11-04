<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\IndexRequest;
use App\Http\Requests\Users\CreateRequest;
use App\Http\Requests\Users\StoreRequest;
use App\Http\Requests\Users\ShowRequest;
use App\Http\Requests\Users\EditRequest;
use App\Http\Requests\Users\UpdateRequest;
use App\Http\Requests\Users\DestroyRequest;
use App\User;
use App\Role;
use DB;
use Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id','ASC')->get();
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = [];
        return response()->json($data, 403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['active'] = true;

        $user = User::create($input);

        if(!empty($input['roles']))
        {
            foreach($request->input('roles') as $role)
            {
                $user->attachRole($role);
            }
        } else {
            $user->attachRole(2);
        }

        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $id = (int)$request->user;

        $user = User::find($id);

        return !empty($user) ? response()->json($user, 200) : response()->json(['error' => 'Not Found'],404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EditRequest $request)
    {
        $id = (int)$request->user;

        $user = User::find($id);
        $roles = Role::pluck('display_name','id');
        $userRole = $user->roles->pluck('id','id')->toArray();

        return view('users.edit', compact('user','roles','userRole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
        $id = (int)$request->user;

        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));
        }

        $user = User::find($id);
        $user->update($input);

        if(Auth::user()->can('roles.update') && !empty($request->input('roles')))
        {
            DB::table('role_user')->where('user_id',$id)->delete();

            foreach($request->input('roles') as $role)
            {
                $user->attachRole($role);
            }
        }

        if(Auth::user()->can('users.index'))
        {
            return redirect()->route('users.index')
                            ->with('success','User updated successfully');
        } else {
            return redirect()->route('users.edit', ['user' => $id])
                            ->with('success','User updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        $id = (int)$request->user;

        User::find($id)->delete();

        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
