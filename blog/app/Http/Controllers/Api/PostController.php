<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostController extends Controller
{

    protected $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getPosts();

        return PostResource::collection($posts);
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postService->createPost($request->validated());

        return new PostResource($post);
    }
}
