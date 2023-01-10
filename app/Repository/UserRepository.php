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
					->where('users.active','=', 1)						
					->select(
						'users.id as idUser', 'users.name as nameUser', 
						'links.id as idLink', 'links.name as nameLink',
						'groups.name as nameGroup', 'groups.id as idGroup'
					)
					->get();
		
	}
}


