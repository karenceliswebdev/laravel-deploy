<div class="flex flex-col justify-center items-center mt-10">
    <div class="flex flex-col items-center w-4/6">
        @foreach ($comments as $comment)
            <x-card.comment :post="$post" :comment="$comment" />
        @endforeach
    </div>
</div>