@props(['name'])

<x-form.label name="{{ $name }}" />

<br>
<input type="file" name ="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }} class="border-gray-200 border-4 my-3">
</input>
<br>

<x-form.error name="{{ $name }}" />
