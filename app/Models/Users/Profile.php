<?php
// User profile database
namespace App\Models\Users;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
	protected $table = 'profiles';

	public function user(){
		return $this->belongsTo('App\Models\Users\User', 'id');
	}
}