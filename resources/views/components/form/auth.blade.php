@props(['name'])

<form method="post" action="{{ route($name) }}">
    @csrf
    <x-form.input name="email" widthSize="6/6" type="text" />
    <x-form.error name="email" />
    <x-form.input name="password" widthSize="6/6" type="password" />
    <x-form.error name="password" />
    <button type="submit" class="bg-blue-500 text-white px-3 h-10 flex items-center hover:bg-blue-600">{{ ucwords($name) }}</button>
</form>