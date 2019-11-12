<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;
use App\Services\PostService;

class PostController extends Controller
{
    //
    protected $postservice;

	public function __construct(PostService $postservice){
		// Here we perform dependency Injection.
		$this->postservice = $postservice;
	}

    public function index(){
    	$posts = $this->postservice->index();
    	return view('index', compact('posts'));
    }

    public function create(PostRequest $request){
      $this->postservice->create($request);
      return back()->with(['status'=>$this->postservice]);
    }
 
    public function read($id){
       $post = $this->postservice->read($id);
       return view('edit', compact('post'));
    }
 
    public function update(PostRequest $request, $id){
       $post = $this->postservice->update($request, $id);
       return redirect()->back()->with('status', 'Post has been updated succesfully');
    }
 
    public function delete($id){
     $this->postservice->delete($id);
     return back()->with(['status'=>'Deleted successfully']);
    }
}
