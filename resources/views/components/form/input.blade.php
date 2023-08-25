@props(['name', 'widthSize', 'type'])

<x-form.label name="{{ $name }}" />

<br>
<input type="{{ $type }}" name ="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }} class="border-gray-200 border-4 my-3 w-{{ $widthSize }}">
</input>
<br>

<x-form.error name="{{ $name }}" />

 