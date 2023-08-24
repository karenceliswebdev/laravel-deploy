<x-layout>
    <x-slot name="content">
        <x-header name="create new post" />
        <x-link.back :path="route('profile')" />
        <div class="flex flex-col items-center">
            <div class="flex flex-col items-center border-gray-200 border-4 p-4 w-1.5/3 gap-5">
                <form method="post" action="{{ route('profile.post.store') }}" enctype="multipart/form-data" class="max-w ml-20">
                    @csrf 
                    <x-form.input name="title" />
                    <x-form.input name="slug" />
                    <x-form.file name="picture" />
                    <x-form.textarea name="content" rowSize="30" method="create"/></textarea>
                    <button type="submit" class="bg-blue-500 text-white px-3 h-10 flex items-center hover:bg-blue-600">save</button> 
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>