<?php

use function Livewire\Volt\{state};
use App\Models\Portfolio;
use Livewire\Volt\Component;

new class extends Component {
    public $portfolios;

    public function mount()
    {
        $this->portfolios = Portfolio::select('title', 'description', 'image_path', 'project_url', 'github_url', 'status')->get();
    }
};

?>


<div class="space-y-6 {{ count($portfolios) === 0 ? 'hidden' : '' }}">
    <div class="flex items-end justify-start gap-4">
        <h1 class="text-2xl font-bold text-base-content">Portfolios</h1>
    </div>
    <p class="text-sm text-base-content/50">
        Here are some of my recent projects that showcase my skills and expertise in web development. Each project
        reflects my commitment to creating efficient, user-friendly, and visually appealing web applications.
    </p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($portfolios as $portfolio)
            <x-portfolio-item :portfolio="$portfolio" />
        @endforeach
    </div>
</div>
