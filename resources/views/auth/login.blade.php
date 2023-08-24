<x-layout>
    <x-slot name="content">
        <x-header name="login"/>
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-center border-gray-200 border-4 p-4 w-1/6 gap-5">
                <x-form.auth name="login" />
                <p>Don't have an account?<br><a href="{{ route('register') }}" class="hover:text-blue-500">register here</a></p>
            </div>
        </div>
    </x-slot>
</x-layout>