<?php

namespace FCB\Http\Controllers;

use FCB\Models\User;
use FCB\Models\GroupUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('group_users')
            ->join('users', 'group_users.user_id', '=', 'users.id')
            ->join('groups', 'group_users.group_id', '=', 'groups.id')
            ->join('links', 'users.link_id', '=', 'links.id')
            ->select('users.id as idUser', 'users.name as nameUser',
            'group_users.group_id','group_users.user_id', 'group_users.id as id', 'groups.id as idGroup', 'groups.name as nameGroup', 
            'links.id as idLink', 'links.name as nameLink')
            ->get();
        return response()->json($users);
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
       try {
            GroupUser::create($request->all());
            return response()->json(['message' => 'Membro inserido no grupo', 'type'=> 'success'], 200);
       } catch (\Throwable $th) {
            return response()->json(['error: ' => 'Erro: '.$th->getMessage()], 400);
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \FCB\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function show(GroupUser $groupUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \FCB\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupUser $groupUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \FCB\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GroupUser $groupUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \FCB\Models\GroupUser  $groupUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupUser $groupUser)
    {
        //
    }
}
