
<div class="flex flex-col items-center my-10">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-gray-200 border-4 p-4">
                <table class="min-w-full divide-y-4 divide-gray-200">
                    <tbody class="bg-white divide-y-4 divide-gray-200">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900">
                                        <img src="/storage/{{ $post->picture }}" alt="Blog Post Image" class="w-full h-20 object-contain">
                                        </div>
                                    </div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="text-sm font-medium text-gray-900 mr-20 hover:text-blue-500">
                                            <a href="{{ route('post.show', ['post' => $post]) }}">
                                            {{ Str::limit($post->title, 40) }}
                                            </a>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('profile.post.edit', ['post' => $post]) }}" class="text-blue-500 hover:text-blue-600">Edit</a>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form method="POST" action="{{ route('profile.post.delete', ['post' => $post]) }}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="text-xs text-gray-400 hover:text-gray-500">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>