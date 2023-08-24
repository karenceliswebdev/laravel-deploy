@if (session('error'))
    <div class="flex justify-center h-11">
        <p class="bg-red-500 font-bold text-white max-w-xs px-3 h-11 py-5 flex items-center absolute">
            {{ session('error') }}
        </p>
    </div>
@endif