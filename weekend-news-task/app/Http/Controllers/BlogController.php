<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function getAllNews(){
        
         $allNews = Blog::all();

         return view('welcome',compact('allNews'));

    }

    public function getById($id){

        $getNews = Blog::FindOrFail($id);
        
        return view('news-details',compact('getNews'));
    }

    public function storeNews(Request $request){


        $message = [
            'blog.required' => 'please enter title',
            'file_path.required' => 'please choose file',
            'content.required' => 'please enter content',
        ];
        $request->validate([
            'blog' => 'required',
            'file_path' => 'required|mimes:jpeg,png,jpg,bmp,gif,svg',
            'content' => 'required',
        ],$message);

        $createBlog = new Blog;

        $createBlog->blog = $request->blog;

        $image = request()->file('file_path');

        $assignName = time().'.'.$image->getClientOriginalExtension();

        $createBlog->file_path = $assignName;

        $image->move('./images', $assignName);

        $createBlog->content = $request->content;

        if ($createBlog->save()) {
            return view('dashboard');
        }

    }
}
