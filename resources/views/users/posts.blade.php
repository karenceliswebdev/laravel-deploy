<x-layout>
    <x-slot name="content">
        <x-header name="your posts" />
        <a href="{{ route('profile.post.create') }}" class="pl-4 h-11 bg-blue-500 text-white w-28 flex items-center mx-auto hover:bg-blue-600">
            <span class="text-center">Create post</span>
        </a>
        @if ($posts->count())
            <x-posts.table :posts="$posts" />
            <x-button.paginate :name="$posts" :marginSize="96" />  
        @else
            <p class="text-center my-10">No posts yet.</p>
        @endif
    </x-slot>
</x-layout>


