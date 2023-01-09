<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $casts = [
	    'created_at' => 'datetime:d/m/Y', // Change your format
	    'updated_at' => 'datetime:d/m/Y',
	];

	public function usersGroup()
    {
        return $this->hasMany('App\Models\GroupUser');
    }
}
