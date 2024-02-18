<?php

namespace App\Controllers;

use App\Models\Post;


class BlogController extends Controller
{
  public function index()
  {
   // Instance le model Post 
    $post = new Post($this->getDB());
    $posts = $post->all();
  return $this->view('blog.index', compact('posts'));
  }


 

  
}
