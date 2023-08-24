@props(['name'])

@error( $name )
    <p class="text-red-500 mb-2">{{ $message }}</p>
@enderror