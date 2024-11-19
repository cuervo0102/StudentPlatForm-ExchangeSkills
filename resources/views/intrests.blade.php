<div id="subFieldsContainer">
    @if(isset($fields) && $fields == 'field1')
        <x-input-label for="sub_field1" :value="__('Sub Field 1')" />
        <select name="sub_field1" class="form-input mt-1 block w-full">
            <option value="CyberSecurity" {{ old('sub_field1') == 'CyberSecurity' ? 'selected' : '' }}>CyberSecurity</option>
            <option value="AI" {{ old('sub_field1') == 'AI' ? 'selected' : '' }}>AI</option>
            <option value="Web" {{ old('sub_field1') == 'Web' ? 'selected' : '' }}>Web</option>
            <option value="Mobile" {{ old('sub_field1') == 'Mobile' ? 'selected' : '' }}>Mobile</option>
        </select>
    @elseif(isset($fields) && $fields == 'field2')
        <x-input-label for="sub_field2" :value="__('Sub Field 2')" />
        <select name="sub_field2" class="form-input mt-1 block w-full">
            <option value="sub1" {{ old('sub_field2') == 'sub1' ? 'selected' : '' }}>sub1</option>
            <option value="sub2" {{ old('sub_field2') == 'sub2' ? 'selected' : '' }}>sub2</option>
            <option value="sub3" {{ old('sub_field2') == 'sub3' ? 'selected' : '' }}>sub3</option>
            <option value="sub4" {{ old('sub_field2') == 'sub4' ? 'selected' : '' }}>sub4</option>
        </select>
    @elseif(isset($fields) && $fields == 'field3')
        <x-input-label for="sub_field3" :value="__('Sub Field 3')" />
        <select name="sub_field3" class="form-input mt-1 block w-full">
            <option value="subF1" {{ old('sub_field3') == 'subF1' ? 'selected' : '' }}>subF1</option>
            <option value="subF2" {{ old('sub_field3') == 'subF2' ? 'selected' : '' }}>subF2</option>
            <option value="subF3" {{ old('sub_field3') == 'subF3' ? 'selected' : '' }}>subF3</option>
            <option value="subF4" {{ old('sub_field3') == 'subF4' ? 'selected' : '' }}>subF4</option>
        </select>
    @endif
</div>
