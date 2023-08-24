<div class="flex flex-col items-center">
    <div class="flex flex-col items-center w-3/6 gap-5">
        <form method="post" action="{{ route('profile.comment.store', ['post' => $post]) }}" class="max-w ml-20">
            @csrf 
            <x-form.textarea name="content" rowSize="10" method="create"/>
            <button type="submit" class="bg-blue-500 text-white px-3 h-10 flex items-center hover:bg-blue-600">save</button> 
        </form>
    </div>
</div>