<?php

namespace App\Http\Controllers;

use App\Models\Blogpost;
use Illuminate\Http\Request;

class BlogpostController extends Controller
{
    public function createBlogpost(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);
        $incomingFields['user_id'] = auth()->id();

        Blogpost::create($incomingFields);
        return redirect('/')->with('success', 'Blog post created successfully!');
    }

    public function showCreateBlogpostForm()
    {
        return view('create-post');
    }
}
