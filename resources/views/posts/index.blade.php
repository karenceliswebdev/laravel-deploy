<x-layout>
    <x-slot name="content">
        <x-header name="recent posts" />
        @if ($posts->count())
            <x-posts.grid :posts="$posts" />
            <div class="mt-7">
                <x-button.paginate :name="$posts" :marginSize="11"/>
            </div>
        @else
            <p class="text-center">No posts yet. Please check back later.</p>
        @endif
    </x-slot>
</x-layout>