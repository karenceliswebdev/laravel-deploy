<div class="flex flex-row justify-center">
    <div class="flex flex-wrap justify-evenly w-5/6 gap-5">
        @foreach ($posts as $post)
            <x-card.post-medium :post="$post" />
        @endforeach
    </div>
</div>