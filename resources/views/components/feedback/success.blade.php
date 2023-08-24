@if (session('success'))
    <div class="flex justify-center h-11">
        <p class="bg-green-500 font-bold text-white max-w-xs px-3 h-11 flex items-center absolute">
            {{ session('success') }}
        </p>
    </div>
@endif
