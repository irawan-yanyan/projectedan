<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $users = User::with('posts')->get();
        $users = $users->unique('id');
       // dd($users);
       return view('userpost',compact('users'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        // ]);
        $users = User::with('posts')->find($id);
        
        return view('edituserpost',compact('users'));
    }

    public function editPost($idpost)
    {
        // $validated = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'email' => 'required|email|max:255',
        // ]);
        
        $post = Post::find($idpost);
        //dd($post);
       // return view('editpost',compact(['post','iduser']));
       return view('editpost',compact('post'));
    }

    public function updatePost(Request $request,$idpost)
    {
        dd($request->hasFile('image'));
       
        $request->validate([
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048',
            'description'   => 'required|min:2',
           
        ]);

      //  dd($request->hasFile('image'));
        //$post = Post::findOrFail($idpost);
        $post = Post::find($idpost);
        //get user
        //$user= User::findOrFail($post->user_id);
       // dd($user);
        if($request->hasFile('image')) {
    
            // $post->update([
            //     'decription'=> $request->description,
                
            // ]);
            $post->description = $request->description;
            
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/posts/'.$post->image);
    
            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
    
            // $post->update([
            //     'image'=> $image->hashName(),
            //     'description'=> $request->description,
            // ]);
            $post->description = $request->description;
            //$post->image = $image->hashName();
    
        }
    
        if($post->update()){
          //  dd('berhasil'.$request->description);
            // redirect dengan pesan sukses
            return redirect()->route('post.edit',['post'=>$post->user_id])->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //dd('gaaga');
            // redirect dengan pesan error
           return redirect()->route('editpost',['post'=>$idpost])->with(['error' => 'Data Gagal Diupdate!']);
        }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
