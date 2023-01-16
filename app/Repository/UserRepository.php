<?php

namespace App\Repository;

use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository {
	
	public function allUsers()
	{
		return  User::leftJoin('group_users', 'users.id' , '=', 'group_users.user_id')
					->leftJoin('links', 'users.link_id', '=', 'links.id')
					->leftJoin('groups', 'group_users.group_id', '=', 'groups.id')					
					->select(
						'users.id as idUser', 'users.name as nameUser', 'users.active', 
						'links.id as idLink', 'links.name as nameLink',
						'groups.name as nameGroup', 'groups.id as idGroup'
					)
					// ->limit(1)
					->get();
		
	}

	public function getGroups($id)
	{
		return  User::leftJoin('group_users', 'users.id' , '=', 'group_users.user_id')
					->leftJoin('links', 'users.link_id', '=', 'links.id')
					->leftJoin('groups', 'group_users.group_id', '=', 'groups.id')					
					->select(
						'users.*', 
						'group_users.id as idGroupUser','group_users.user_id', 'group_users.group_id',
						'links.id as idLink', 'links.name as nameLink',
						'groups.name as nameGroup', 'groups.id as idGroup'
					)
					->where('users.id', '=', $id)
					->get();
	}

}


