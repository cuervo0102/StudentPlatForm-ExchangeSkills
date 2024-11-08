<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div>
        <label for="post">Write your post:</label>
        <input type="text" name="post" >
        <button type="submit">Submit</button>
    </div>
</form>
