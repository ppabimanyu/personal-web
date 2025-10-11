<?php

use function Livewire\Volt\{state};
use Livewire\Volt\Component;
use App\Models\Post;

new class extends Component {
    public $posts;

    public function mount()
    {
        $this->posts = Post::all();
    }
};

?>

<div class="space-y-6">
    <div class="flex items-end justify-start gap-4">
        <h1 class="text-2xl font-bold">Blogs</h1>
    </div>
    <p class="text-sm text-base-content/50">
        I’ve been sharing insights through my blog and newsletter for the past
        year. My approach is to simplify complex topics. You’ll discover posts
        about the latest technologies catching my interest alongside my
        professional growth and learning journey. As I evolve in my career, I
        enjoy passing on the knowledge I’ve gained.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($posts as $post)
            <a href="/blogs/{{ $post->slug }}"><x-blog-item :post="$post" /></a>
        @endforeach
    </div>
    <div class="join justify-center w-full">
        <input class="join-item btn btn-square" type="radio" name="options" aria-label="1" checked="checked" />
        <input class="join-item btn btn-square" type="radio" name="options" aria-label="2" />
        <input class="join-item btn btn-square" type="radio" name="options" aria-label="3" />
        <input class="join-item btn btn-square" type="radio" name="options" aria-label="4" />
    </div>
</div>
