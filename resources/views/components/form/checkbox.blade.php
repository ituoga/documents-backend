@props([
'name' => '',
'value' => '',
'title' => '',
'checked',
'hide'
])

@phpvar($checked ??= false)
@phpvar($hide ??=false)


<div class="form-check ml-2">
    @if($hide)
    <input type="hidden" name="{{$name}}" value="0" />
    @endif
    <input name='{{ $name }}' id='{{ $name }}' value='{{ $value }}' @if ($checked==$value ) checked="checked" @endif {{
        $attributes->merge(['class'=>'form-check-input',
    'type'=>'checkbox']) }} />
    <label class="form-check-label">{{ $title }}</label>
</div>

@error(HtmlToString::parse($attributes->get("name")))
<div class="alert alert-danger">{{ $message }}</div>
@enderror
