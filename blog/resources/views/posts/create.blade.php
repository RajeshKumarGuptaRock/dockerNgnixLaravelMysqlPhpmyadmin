<h2>Create Post</h2>

<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    <input type="text" name="title" placeholder="Title"><br><br>
    <textarea name="description"></textarea><br><br>

    <button type="submit">Save</button>
</form>