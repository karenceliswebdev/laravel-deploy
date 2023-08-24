<article class="flex flex-col gap-2 border-gray-200 border-4 p-2 w-1/2 mr-6 mb-10">
    <div class="flex justify-between items-center">    
        <p>{{ $comment->user->email }} 
            @if($post->user == $comment->user)
            <span class="text-blue-500">author</span>
            @endif 
        </p> 
        @if($comment->user->id == auth()->id())
            <div class="px-6 whitespace-nowrap text-right text-sm font-medium">
                <form method="post" action="{{ route('profile.comment.delete', ['comment' => $comment]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-xs text-gray-400 hover:text-gray-500">Delete</button>
                </form>
            </div>
        @endif
    </div>  
    <hr class="border-2 border-gray-200">
    <p class="mb-5">{{ $comment->content }}</p>  
</article>
