<?php
namespace App\Helpers;

class Filter{
	public static function admUser($id){
		?>
<ul class="actions">
<li class="dropdown">
<a data-toggle="dropdown"><i class="zmdi zmdi-more-vert"></i></a>
<ul class="dropdown-menu dropdown-menu-right">
	<li><a href="user/edit/<?=$id?>"><i class="zmdi zmdi-edit"></i> Edit</a></li>
	<li><a><i class="zmdi zmdi-delete"></i> Delete</a></li>
</ul>
</li>
</ul>
		<?php
	}

	public static function memberHead($data){
		switch($data){
			case "1";
				return " (RING-1)";
			case "2";
				return " (Head)";
		}
	}

	public static function memberUG($data){
		switch($data){
			case "1";
				return "Leader Nasional";
			case "2";
				return "Senior Leader";
			case "3";
				return "Junior Leader";
			case "4";
				return "Member / Leader";
			case "5";
				return "Member (Product)";
			case "6";
				return "Pending / DP";
			case "7";
				return "Virus";
			default;
				return "N/A";
		}
	}

	public static function frontendmenu($page, $menu){
		//var_dump($page);
		//var_dump($menu);
		if(isset($page)){
			switch($page){
				case "1"; //Page
					if($menu == 1) return " active";
					break;
				case "2"; //Misc
					if($menu == 2) return " active";
					break;
				case "3"; //Support & Download
					if($menu == 3) return " active";
					break;
			}
		}
	}

	public static function Role($id){
		switch($id){
			case "1";
			return "SYSTEM";
			case "2";
			return "Administrator";
			case "3";
			return "Leader Nasional";
			case "4";
			return "RING-1";
			case "5";
			return "User";
			default;
			return "N/A";
		}
		//print_r($role);
		/*foreach ($role as $data){
			if($id == $data->id){
				return $role->display_name;
				break;
			}else{
				return "N/A ".$role->id;
			}
		}*/
	}

	public static function cs($cs){
		switch($cs){
			case "1";
			return "Info / CS";
			case "2";
			return "Marketing";
			case "3";
			return "Events";
			case "4";
			return "Job Vacancy/Partner";
			case "5";
			return "Revision";
			default;
			return "N/A";
		}
	}

	public static function rStatus($status){
		switch($status){
			case "0"; return "<p class=\"label bg-red\">Cancelled</p>"; break;
			case "1"; return "<p class=\"label bg-green\">Accepted</p>"; break;
			case "2"; return "<p class=\"label bg-yellow\">Waiting for Payment</p>"; break;
			case "3"; return "<p class=\"label bg-blue\">Exam Testing</p>"; break;
			case "4"; return "<p class=\"label bg-green\">Waiting for Testing</p>"; break;
			default; return "<p class=\"label bg-yellow\">Unknown</p>"; break;
		}
	}
	public static function rSave($a, $b){
		if($a <> $b) $a;
	}
}