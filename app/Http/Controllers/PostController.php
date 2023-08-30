<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Exports\PostExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade as PDF;

class PostController extends Controller
{
    //

    public function index(){
        $posts = Post::latest()->get();

        return view('posts.index', compact('posts'));
    }

    public function create(){
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'image'     => 'required|image|mimes:jpeg,png,jpg:max:2048',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        $image = $request->file('image');
        $image->storeAs('public/posts', $image->hashName());

        $posts = Post::create([
            'image'     => $image->hashName(),
            'title'     => $request->title,
            'content'   => $request->content
        ]);

        if ($posts) {
            return redirect()->route('posts.index')->with(['success' => 'berhasil menambahkan specimen']);
        }else{
            return redirect()->back()->withInput()->with(['error' => 'gagal menambahkan specimen']);
        }


    }

    public function show($id){
        $post = Post::findOrFail($id);
        return view('posts.detail', compact('post'));
    }

    public function edit($id){
        $post =Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id){

        $this->validate($request,[
            'image'     => 'required|mimes:jpeg,jpg,png|max:2048',
            'title'     => 'required',
            'content'   => 'required'
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('/public/posts/'.$image->hashName());

            Storage::delete('public/posts/'.$post->image);

            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content
            ]);


        }else{

            $post->update([
                'title'     => $request->title,
                'content'   => $request->content
            ]);

        }

        if ($post) {
            return redirect()->route('posts.index')->with(['success'=>'berhasil merubah specimen']);
        }else{
            return redirect()->back()->withInput()->with(['error' => 'gagal merubah specimen']);
        }
    }

    public function destroy($id){

        $post = Post::findOrFail($id);
        $post->delete();

        if ($post) {
            return redirect()->route('posts.index')->with(['success'=>'berhasil menghapus specimen']);
        }else{
            return redirect()->back()->with(['error'=>'gagal merubah specimen']);
        }

    }

    public function export(){

        return Excel::download(new PostExport(), 'posts.xlsx');

    }

    public function exportpdf(){
        $post = Post::all();

        $pdf = \PDF::loadview('posts.exportpdf', ['posts' => $post]);
        return $pdf->download('report_post.pdf');

    }
}
