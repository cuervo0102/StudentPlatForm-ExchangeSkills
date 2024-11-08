<div class="container">
    <h1>Confirm Deletion</h1>

    <p>Are you sure you want to delete this post?</p>
    <p><strong>{{ $post->post }}</strong></p>

    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" Yes, Delete</button>
        <a href="{{ route('posts.index') }}" >Cancel</a>
    </form>
</div>

