<form {{ $attributes->merge(['method'=>'POST', 'enctype'=>'multipart/form-data'])}}>
    {{$slot}}
</form>
