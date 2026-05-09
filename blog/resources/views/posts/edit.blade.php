<h2>Edit Post</h2>

<form method="POST" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $post->title }}"><br><br>
    <textarea name="description">{{ $post->description }}</textarea><br><br>

    <button type="submit">Update</button>
</form>