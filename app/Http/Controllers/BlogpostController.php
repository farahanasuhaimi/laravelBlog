<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    public function showSingleBlogpost(Blogpost $post)
    {
        $ourHTML = Str::markdown($post->body);
        $post['body'] = $ourHTML;
        return view('single-post', ['post' => $post]);
    }

    public function createBlogpost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        $newPost = Blogpost::create($incomingFields);
        return redirect("/blogpost/{$newPost->id}")->with('success', 'Blog post created successfully!');
    }

    public function showCreateBlogpostForm()
    {
        return view('create-post');
    }
}
