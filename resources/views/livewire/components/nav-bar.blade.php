<?php

use function Livewire\Volt\{state};
use App\Models\Profile;
use Livewire\Volt\Component;
use Illuminate\Support\Str;

new class extends Component {
    public $profile;
    public $profileNameHeader;
    public $profileNameAcronym;

    public function mount()
    {
        $this->profile = Profile::first();

        if (!$this->profile) {
            abort(500, 'Profile not found.');
        }

        $nameParts = explode(' ', $this->profile->name);
        if (count($nameParts) > 2) {
            $this->profileNameHeader = implode(' ', array_slice($nameParts, 0, 2)) . ' ' . substr(end($nameParts), 0, 1) . '.';
        } else {
            $this->profileNameHeader = $this->profile->name;
        }

        $this->profileNameAcronym = preg_replace('/\s+/', '', Str::upper(implode('', array_map(fn($n) => $n[0], explode(' ', $this->profile->name)))));
    }
};
?>

<div class="sticky top-0 z-50 backdrop-blur-sm"">
    <div class="flex py-4 px-2 md:px-4 lg:px-10 items-center justify-center max-w-7xl mx-auto"">
        <div class="flex justify-center items-center w-full">
            <div class="flex flex-1/5">
                <a href="/" wire:navigate>
                    <x-avatar placeholder="{{ $profileNameAcronym }}" title="{{ $profileNameHeader }}"
                        subtitle="{{ $profile->title }}" class="!w-10" />
                </a>
            </div>
            <div class="flex flex-3/5 tabs justify-center" role="tablist">
                <a href="/blogs" wire:navigate
                    class="text-md tab {{ request()->is('blogs') ? 'tab-active' : '' }}">Blogs</a>
                <a href="{{ $profile->linkedin_url }}" target="_blank" class="text-md tab">LinkedIn</a>
                <a href="{{ $profile->github_url }}" target="_blank" class="text-md tab">Github</a>
                <a href="{{ asset('storage/' . $profile->resume_path) }}" wire:navigate class="text-md tab">Resume</a>
            </div>
            <div class="flex flex-1/5 justify-end">
                <div class="flex space-x-6 items-center">
                    <x-theme-toggle darkTheme="dark" lightTheme="light" />
                    <x-button class="btn-primary btn-dash">
                        Subscribe
                    </x-button>
                </div>
            </div>
        </div>
    </div>
</div>
