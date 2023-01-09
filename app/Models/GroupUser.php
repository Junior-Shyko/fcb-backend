<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'group_id'
    ];

    public function add_user(User $user,$grupo )
    {
    	try {
    		$data = ['user_id' => $user->id, 'group_id' => $grupo];
    		GroupUser::create($data);
    		return response()->json(['message' => 'Sucesso'], 200);
    	} catch (Exception $e) {
    		return response()->json(['message' => 'Error: '.$e->getMessage()], 400);
    	}
    }
}
