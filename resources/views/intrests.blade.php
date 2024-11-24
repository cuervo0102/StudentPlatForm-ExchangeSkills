
<form action="{{ route('sub-fields.store') }}" method="POST">
    @csrf
    <div id="subFieldsContainer">
        @if(isset($fields) && $fields == 'field1')
            <x-input-label for="sub_field1" :value="__('Sub Field 1')" />
            <div>
                <label>
                    <input type="checkbox" name="sub_field1[]" value="CyberSecurity" 
                    {{ is_array(old('sub_field1')) && in_array('CyberSecurity', old('sub_field1')) ? 'checked' : '' }}>
                    CyberSecurity
                </label>
                <label>
                    <input type="checkbox" name="sub_field1[]" value="AI" 
                    {{ is_array(old('sub_field1')) && in_array('AI', old('sub_field1')) ? 'checked' : '' }}>
                    AI
                </label>
                <label>
                    <input type="checkbox" name="sub_field1[]" value="Web" 
                    {{ is_array(old('sub_field1')) && in_array('Web', old('sub_field1')) ? 'checked' : '' }}>
                    Web
                </label>
                <label>
                    <input type="checkbox" name="sub_field1[]" value="Mobile" 
                    {{ is_array(old('sub_field1')) && in_array('Mobile', old('sub_field1')) ? 'checked' : '' }}>
                    Mobile
                </label>
            </div>
        @elseif(isset($fields) && $fields == 'field2')
            <x-input-label for="sub_field2" :value="__('Sub Field 2')" />
            <div>
                <label>
                    <input type="checkbox" name="sub_field2[]" value="sub1" 
                    {{ is_array(old('sub_field2')) && in_array('sub1', old('sub_field2')) ? 'checked' : '' }}>
                    sub1
                </label>
                <label>
                    <input type="checkbox" name="sub_field2[]" value="sub2" 
                    {{ is_array(old('sub_field2')) && in_array('sub2', old('sub_field2')) ? 'checked' : '' }}>
                    sub2
                </label>
                <label>
                    <input type="checkbox" name="sub_field2[]" value="sub3" 
                    {{ is_array(old('sub_field2')) && in_array('sub3', old('sub_field2')) ? 'checked' : '' }}>
                    sub3
                </label>
                <label>
                    <input type="checkbox" name="sub_field2[]" value="sub4" 
                    {{ is_array(old('sub_field2')) && in_array('sub4', old('sub_field2')) ? 'checked' : '' }}>
                    sub4
                </label>
            </div>
        @elseif(isset($fields) && $fields == 'field3')
            <x-input-label for="sub_field3" :value="__('Sub Field 3')" />
            <div>
                <label>
                    <input type="checkbox" name="sub_field3[]" value="subF1" 
                    {{ is_array(old('sub_field3')) && in_array('subF1', old('sub_field3')) ? 'checked' : '' }}>
                    subF1
                </label>
                <label>
                    <input type="checkbox" name="sub_field3[]" value="subF2" 
                    {{ is_array(old('sub_field3')) && in_array('subF2', old('sub_field3')) ? 'checked' : '' }}>
                    subF2
                </label>
                <label>
                    <input type="checkbox" name="sub_field3[]" value="subF3" 
                    {{ is_array(old('sub_field3')) && in_array('subF3', old('sub_field3')) ? 'checked' : '' }}>
                    subF3
                </label>
                <label>
                    <input type="checkbox" name="sub_field3[]" value="subF4" 
                    {{ is_array(old('sub_field3')) && in_array('subF4', old('sub_field3')) ? 'checked' : '' }}>
                    subF4
                </label>
            </div>
        @endif
    </div>
    <button type="submit">Submit</button>
</form>







