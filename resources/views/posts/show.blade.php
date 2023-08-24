<x-layout>
    <x-slot name="content">
        <x-link.back :path="route('home')" />
        <div class="flex flex-row justify-evenly items-center">
            <x-button.like :post="$post" />
            <x-card.post-large :post="$post" /> 
            <x-button.dislike :post="$post" />
        </div>
        <x-subheader name="comment section" />
        @auth
            <x-comments.create :post="$post"/>
        @endauth
        @if ($comments->count())
            <x-comments.grid :post="$post" :comments="$comments"/> 
            <x-button.paginate :name="$comments" :marginSize="96" />  
        @else
            <p class="text-center py-10">No comments yet. Please check back later.</p>
        @endif
    </x-slot>
</x-layout>