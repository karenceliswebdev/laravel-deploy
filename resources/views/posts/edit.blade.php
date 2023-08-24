<x-layout>
    <x-slot name="content">
        <x-header name="edit post" />
        <x-link.back :path="route('profile')" />
        <div class="flex flex-col items-center mb-10">
            <div class="flex flex-col items-center border-gray-200 border-4 p-4 w-1.5/3 gap-5">
                <form method="post" action="{{ route('profile.post.update', ['post' => $post]) }}" enctype="multipart/form-data" class="max-w ml-20">
                    @csrf
                    @method('PATCH')
                    <x-form.input name="title" :value="old('title', $post->title)" />
                    <x-form.input name="slug" :value="old('slug', $post->slug)" />
                    <x-form.file name="picture" :value="old('picture', $post->picture)" />
                    <img src="/storage/{{ $post->picture }}" alt="Blog Post Image" class="h-40 object-contain mt-2 mb-5">
                    <x-form.textarea name="content" rowSize="30" method="edit">{{ old('content', $post->content) }}</x-form.textarea>
                    <button type="submit" class="bg-blue-500 text-white px-3 h-10 flex items-center hover:bg-blue-600">save</button> 
                </form>
            </div>
        </div>
    </x-slot>
</x-layout>