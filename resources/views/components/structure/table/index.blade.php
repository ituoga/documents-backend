@props(['headers'])
<table {{ $attributes->merge(['class' => 'table table-hover
    table-responsive-stack mt-3', 'id' => 't1']) }}>
    @if(!empty($headers))
    <thead>
        <tr>
            @foreach($headers as $item)
            <th>{{$item}}</th>
            @endforeach
        </tr>
    </thead>
    @endif
    <tbody>
        {{$slot}}
    </tbody>
</table>
