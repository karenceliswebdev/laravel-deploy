<article class="flex flex-col overflow-hidden w-1/4 gap-2 shadow-lg border-gray-200 border-4 p-2">
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
    <img src="/storage/{{ $post->picture }}" alt="Blog Post Image" class="h-64 object-contain my-2">
    <p class="mb-2">{{ Str::limit($post->content, 100) }}</p>
    <a href="{{ route('post.show', ['post' => $post]) }}" class="bg-blue-500 text-white w-1/3 px-3 h-10 flex items-center hover:bg-blue-600">
        read more
    </a>
</article>
