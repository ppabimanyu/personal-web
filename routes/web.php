<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home.home');
Volt::route('/blogs', 'blogs.blogs');
Volt::route('/blogs/{slug}', 'blogs.blog');
