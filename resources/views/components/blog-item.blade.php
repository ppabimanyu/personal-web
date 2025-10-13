<div class="space-y-2 hover:bg-base-200 p-4 rounded-2xl">
    <div class="overflow-hidden rounded-2xl">
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Blog Item"
            class="rounded-lg hover:scale-120 transition-transform duration-200 ease-in-out h-48 w-full object-cover" />
    </div>
    <div class="h-40 space-y-2">
        <h2 class="text-xl font-bold line-clamp-2 text-base-content">{{ $post->title }}</h2>
        <p class="text-sm text-base-content/50">
            {{ $post->published_at->format('F j, Y') }}
        </p>
        <p class="line-clamp-3 text-sm text-base-content/50">
            {{ $post->description }}
        </p>
    </div>
    <div class="flex gap-2 justify-end">
        <x-badge value="Hello" class="badge-primary" />
    </div>
</div>
