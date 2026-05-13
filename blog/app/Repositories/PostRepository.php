<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository
{

    public function all()
    {
        return Post::latest()->get();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }
}
