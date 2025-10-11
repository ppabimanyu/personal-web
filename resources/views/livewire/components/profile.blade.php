<?php

use function Livewire\Volt\{state};
use App\Models\Profile;
use Livewire\Volt\Component;

new class extends Component {
    public $profile;

    public function mount()
    {
        $this->profile = Profile::first();
    }
};
?>

<div class="flex p-10 rounded-2xl bg-base-200">
    <div class="space-y-4 flex-1">
        <p class="text-sm text-bold text-base-content">Hello, my name is</p>
        <h1 class="text-4xl text-bold text-base-content">{{ $profile->name }}</h1>
        <p class="text-base-content/50">{{ $profile->greeting_text }}</p>
        <p class="text-base-content/50">{{ $profile->bio }}</p>
    </div>
    <div>
        <img src="{{ asset('storage/' . $profile->image_path) }}" class="w-56 h-56 rounded-full object-cover"
            alt="">
    </div>
</div>
