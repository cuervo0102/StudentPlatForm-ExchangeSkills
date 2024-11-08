<div class="container">
    <h1>Posts</h1>
    <a href="{{ route('posts.create') }}">Create New Post</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Post</th>
                <th>Created by</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->post }}</td>
                <td>{{ $post->user ? $post->user->name : 'No user assigned' }}</td>
                <td>
                    @if($post->user_id === auth()->id())
                        <a href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
