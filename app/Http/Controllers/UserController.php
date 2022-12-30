<?php

namespace FCB\Http\Controllers;

use FCB\Models\Link;
use FCB\Models\User;
use FCB\Models\GroupUser;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
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
        $name = str_replace(' ','_',$request->name);
        $dateBirth = Carbon::createFromFormat('d/m/Y', $request->birthDate)->format('Y-m-d');
        $dataUser = ['name' => $request->name, 'email' => $name.'@mail.com' , 'password' => bcrypt('12345678'), 'link_id' => 5, 'birthday' => $dateBirth];
        try {
            $user = User::create($dataUser);
            $group = new GroupUser;
            $group->add_user($user, $request->group_id);
            return response()->json($user,200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error: '.$e->getMessage()], 400);
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
        $batized = 0;
        ($request->batized == 'true') ?? $batized = 1;
        $pass = bcrypt($request->password);
        $request['password'] = $pass;
        $request['baptized'] = $batized;
        $request['state'] = $request->uf;
        try {
            $user = user::find($request->id);
            unset($request->uf);
            $user->update($request->all());
            return response()->json(['message' => 'Success'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error' . $e->getMessage()], 400);
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

    public function getMember($type)
    {
        $link = User::nameMemberToType($type);
        $users = User::where('link_id', $link)->select('id', 'name')->get();
        return response()->json($users);
    }

}
