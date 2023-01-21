<div class="mb-3">
    @if(!empty($required))
    <label for="{{$id}}" class="form-label required">{{$title}}</label>
    @else
    <label class="form-label" for="{{ $id }}">{{ $title }}</label>
    @endif
    <input {{ $attributes->merge(['class'=>'form-control', 'type'=>'text']) }} />
</div>

@error(HtmlToString::parse($attributes->get("name")))
<div class="alert alert-danger">{{ $message }}</div>
@enderror
