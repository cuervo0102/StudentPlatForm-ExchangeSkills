
<div class="container">
    <h1>Edit Post</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="post" >Post</label>
            <input type="text" name="post" id="post"  value="{{ old('post', $post->post) }}" required>
            @error('post')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" >Update Post</button>
    </form>

    <a href="{{ route('posts.index') }}">Back to Posts</a>
</div>
