<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Mark;
use App\Photo;
use App\Post;
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
        $posts = Post::has('photo')->paginate(4); // выбор тех у которых есть фото
        return view('post.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        if ($path = $request->file('image')->store('images', 'public')){
            //$url_img = 'https://via.placeholder.com/640x480.png/00bb88?text=nostrum';
            $user_id = 1;
            $post = Post::create([
                'user_id' => $user_id,
                'title' => $request->title,
                'text' => $request->text,
            ]);
            $photo = new Photo();
            $photo->url = $path;
            $post->photo()->save($photo);
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $ratingForPost = $post->rating();
        $ratingForPhoto = Photo::find($post->photo->id)->rating();
        return view('post.view', [
            'post' => $post,
            'rating_post' => $ratingForPost,
            'rating_photo' => $ratingForPhoto,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function mark(Request $request){
        if (isset($request->post_id)){
            $post = Post::find($request->post_id);
            $mark = $post->marks()->create([
                'type_mark' => $request->mark
            ]);
        } elseif (isset($request->photo_id)){
            $photo = Photo::find($request->photo_id);
            $mark = $photo->marks()->create([
                'type_mark' => $request->mark
            ]);
            dump($mark);
        }else{
            return redirect('/');
        }
        return redirect()->back();
    }
    public function photo($id){
        $photo = Photo::findOrFail($id);
        return view('post.photo', [
            'photo' => $photo
        ]);
    }

    public function rating(){
        $posts = Post::has('photo')->get(); // выбор тех у которых есть фото
        $test = array();
        foreach ($posts as $item){
            $test[$item->id] = $item->ratings();
        }
        asort($test);
        $posts_correct = array_reverse($test, true);
        return view('post.rating', [
            'posts' => $posts,
            'posts_correct' => $posts_correct
        ]);
    }

    public function image(){
        return view('post.image', [
            'path' => 'images/v0pi7ZUmSwsONVOfYwYgMhVSWdVtgHFiVTKdbEjM.png'
        ]);
    }
}
