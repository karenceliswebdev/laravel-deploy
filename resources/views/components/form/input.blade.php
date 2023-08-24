@props(['name'])

<x-form.label name="{{ $name }}" />

<br>
<input type="text" name ="{{ $name }}" id="{{ $name }}" {{ $attributes(['value' => old($name)]) }} class="border-gray-200 border-4 my-3 w-5/6">
</input>
<br>

<x-form.error name="{{ $name }}" />

 