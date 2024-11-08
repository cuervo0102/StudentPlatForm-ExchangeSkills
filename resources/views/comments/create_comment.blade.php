<form action="{{ route('comments.store') }}" method="post">
    @csrf
    <div>
        <label for="comment">Write your comment:</label>
        <input type="text" name="comment" >
        <button type="submit">Submit</button>
    </div>
</form>
