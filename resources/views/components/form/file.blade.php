<div class="mb-3">
    <label class="form-label" for="{{ $id }}">{{ $title }}</label>
    <input {{ $attributes->merge(['class'=>'form-control', 'type'=>'file']) }} />
</div>

@error(HtmlToString::parse($attributes->get("name")))
<div class="alert alert-danger">{{ $message }}</div>
@enderror
