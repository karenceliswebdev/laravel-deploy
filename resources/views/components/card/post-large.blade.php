<article class="flex flex-col gap-2 shadow-lg border-gray-200 border-4 p-2 w-1/2 mb-10">
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
    <img src="/storage/{{ $post->picture }}" alt="Blog Post Image" class="h-96 object-contain my-5">
    <p class="mb-5">{{ $post->content }}</p>
    <hr class="border-2 border-gray-200 mb-2">  
    <p>Post made by: <span class="text-blue-500">{{ $post->user->email }}</span></p>  
</article>