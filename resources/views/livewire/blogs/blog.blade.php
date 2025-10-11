<?php

use function Livewire\Volt\{state};
use Livewire\Volt\Component;
use App\Models\Post;
use Illuminate\Support\Str;

new class extends Component {
    public $post;

    public function mount($slug)
    {
        $this->post = Post::firstWhere('slug', $slug);
        if (!$this->post) {
            abort(404);
        }
    }
};
?>

<div>
    <div class="prose prose-slate mx-auto max-w-4xl mb-32">
        <h1 class="text-4xl font-bold mt-4">{{ $post->title }}</h1>
        <p class="text-sm text-base-content/50 mb-8">
            {{ $post->published_at->format('F j, Y') }}
        </p>
        <p class="text-base-content/50">{{ $post->description }}</p>
        <img src="{{ asset('storage/' . $post->image_path) }}" alt="Thumbnail" class="rounded-lg" />
        <hr>
        {!! Str::markdown($post->content) !!}
    </div>
    <livewire:components.subscribe-news />
</div>
