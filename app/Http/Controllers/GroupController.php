<?php

namespace FCB\Http\Controllers;

use FCB\Models\Group;
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
     * @param  \FCB\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $group = Group::findOrFail($id)->first();
            return response()->json($group);
        } catch (Exception $e) {
            return response()->json(['Error: '.$e->getMessage()]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \FCB\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        try {
            $group = Group::findOrFail($id)->first();
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
     * @param  \FCB\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \FCB\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
    }
}
