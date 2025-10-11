<div class="group relative">
    <div class="space-y-2 p-4 rounded-2xl group group-hover:blur-sm">
        <img src="{{ asset('storage/' . $portfolio->image_path) }}" alt="Blog Item" width={700} height={700}
            class="rounded-lg" />
        <h2 class="text-xl font-bold line-clamp-2 text-base-content">{{ $portfolio->title }}</h2>
        <p class="line-clamp-4 text-sm text-base-content/50">
            {{ $portfolio->description }}
        </p>
        <div class="flex gap-2 justify-end">
            <x-badge value="{{ $portfolio->status }}" class="badge-primary" />
        </div>
    </div>
    <div class="absolute inset-0 flex flex-col gap-4 items-center justify-center">
        <a href="{{ $portfolio->project_url }}" target="_blank">
            <button type="button"
                class="btn opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-primary text-white border-0 w-32 rounded-lg">
                Link
            </button>
        </a>
        <a href="{{ $portfolio->github_url }}" target="_blank">
            <button type="button"
                class="btn opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-black text-white border-0 w-32 rounded-lg">
                Github
            </button>
        </a>
    </div>

</div>
