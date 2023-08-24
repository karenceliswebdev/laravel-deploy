@props(['name', 'rowSize', 'method'])

<x-form.label name="{{ $name }}" />

<br>
    @switch($method)
        @case('create')
            <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rowSize }}" cols="80" class="border-gray-200 border-4 my-3 w-5/6">{{ !empty(old($name)) ? old($name) : '' }}</textarea>
            @break

        @case('edit')
            <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rowSize }}" cols="80" class="border-gray-200 border-4 my-3 w-5/6">{{ $slot ??  old($name) }}</textarea>
            @break

        @default
    @endswitch
<br>

<x-form.error name="{{ $name }}" />