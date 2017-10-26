<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller{
	public function __construct(){
		//$this->middleware('auth');
	}
	public function index(){
		$data['posts'] = Post::orderBy('id', 'DESC')->get();
		return view('posts/index', $data);
	}
	public function getPost($id){
		$data['post'] = Post::where('id', '=', $id)->first();
		return view('posts/post', $data);
	}
}