<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try {
           $group = Group::select('id', 'name', 'created_at')->orderBy('id', 'desc')->get();
           return response()->json($group);
       } catch (Exception $e) {
           return response()->json(['Error: '.$e->getMessage()]);
       }
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
        //dd($request->all());
        try {
            Group::create($request->all());
            return response()->json(['message' => 'success']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error: '.$e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $group = Group::find($id);
        // dd($group->usersGroup);
        try {
            $group = Group::findOrFail($id);
            return response()->json($group);
        } catch (Exception $e) {
            return response()->json(['Error: '.$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try {
            $group = Group::findOrFail($id);
            $group->name = $request['name'];
            $group->save();
            return response()->json(['message' => 'Nome alterado c/ sucesso!', 'type'=>'success']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($idGroup)
    {
        try {
            $group = Group::find($idGroup);
            //EXCLUINDO OS RELACIONAMENTOS
            $group->usersGroup()->delete();
            //EXCLUINDO O GRUPO
            $group->delete();
            // //SE TIVER REGISTRO NA TABELA GROUPS_USER TBM DEVE SER EXCLUÍO
            return response()->json([
                'message' => 'Grupo Excluído com sucesso',
                'type' => 'sucess'
            ]);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

    public function countGeneral()
    {
        return response()->json(['message' =>  Group::count()]);
    }
}
