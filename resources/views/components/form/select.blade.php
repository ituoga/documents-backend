@props(['id', 'options', 'selected', 'title' => ''])

@php
$selected = $selected ?? '';
@endphp

<div class="input-group">
    @if(!empty($title))
    <span class="input-group-text" id="inputGroup-sizing-default" for="{{ $id }}">{{ $title }}</span>
    @endif
    <select id="{{ $id }}" {{ $attributes->merge(['class' => 'selectpicker form-control']) }}
        data-style="white border border-grey"
        data-live-search="true"
        data-size="5">
        <option value=""></option>
        @foreach ($options as $value => $title)
        <option value="{{ $value }}" @if (old($attributes->get("name"), $selected) == $value) selected @endif>{{
            $title }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3"></div>
@if($attributes->get("name"))
@error(HtmlToString::parse($attributes->get("name")))
<div class="alert alert-danger">{{ $message }}</div>
@enderror
@endif
