<h2>Posts</h2>

<a href="{{ route('posts.create') }}">Add Post</a>

@foreach($posts as $post)
    <div>
        <h3>{{ $post->title }}</h3>
        <p>{{ $post->description }}</p>

        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>

        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach