@props(['name'])

<h1 class="text-2xl flex flex-row font-bold justify-center pt-10 pb-10">
    {{ ucwords($name) }}
</h1>