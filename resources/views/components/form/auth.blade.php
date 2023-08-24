@props(['name'])

<form method="post" action="{{ route($name) }}">
    @csrf
    <label for="email">Email:</label><br>
    <input type="text" name ="email" id="email" value="{{ old('email') }}" class="border-gray-200 border-4 my-3"></input><br>
    <x-form.error name="email" />
    <label for="password">Password:</label><br>
    <input type="password" name ="password" id="password" class="border-gray-200 border-4 my-3"></input><br>
    <x-form.error name="password" />
    <button type="submit" class="bg-blue-500 text-white px-3 h-10 flex items-center hover:bg-blue-600">{{ ucwords($name) }}</button>
</form>