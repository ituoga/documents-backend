@props(['tag', 'href'])

@switch($tag)
@case('default')
<a href="{{$href}}" {{ $attributes->merge(['class' => 'btn btn-sm btn-primary mt-2']) }}>
    {{ $slot }}
</a>
@break
@case('secondary')
<a href="{{$href}}" {{ $attributes->merge(['class' => 'btn btn-sm btn-secondary mt-2']) }}>
    {{ $slot }}
</a>
@break
@endswitch
