<form action="{{ route('posts.store') }}" method="post">
    @csrf
    <div>
        <label for="post">Write your post:</label>
        <input type="text" name="post" >
        
        <div>
            <label for="sub_field">Choose a category:</label>
            <select name="sub_field" required>
                <option value="cybersecurity">CyberSecurity</option>
                <option value="ai">AI</option>
                <option value="sub1">SubField1</option>
                <option value="sub3">SubField3</option>
                <option value="mobile">Mobile</option>
                <option value="web">Web</option>
                <option value="subf3">SubFieldF3</option>
                <option value="subf1">SubFieldF1</option>
            </select>
        </div>

        <button type="submit">Submit</button>
    </div>
</form>
