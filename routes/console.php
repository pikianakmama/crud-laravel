<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Post;
use Illuminate\Support\Str;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('rem-cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    $this->comment('Application cache cleared');
})->purpose('Clear application cache');

Artisan::command('dummy-d {count}', function ($count) {
    for ($i = 0; $i < $count; $i++) {
        $title = 'Data Dummy';
        Post::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'status' => '0',
            'content' => 'ini data dummy dengan status draft',
        ]);
    }
    $this->comment(' berhasil buat ' .$count.' data dummy dengan status draft');
})->purpose('data dummy status draft');

Artisan::command('dummy-p {count}', function ($count) {
    for ($i = 0; $i < $count; $i++) {
        $title = 'Data dummy';
        Post::create([
            'title' => $title,
            'slug' => Str::slug($title),
            'status' => '1',
            'content' => 'ini data dummy dengan status publish',
        ]);
    }
    $this->comment(' berhasil buat ' .$count.' data dummy dengan status publish');
})->purpose('data dummy status publish');

Artisan::command('space', function () {
    $freeSpace = disk_free_space('/');
    $totalSpace = disk_total_space('/');
    $this->comment('Free space: ' . number_format($freeSpace / 1024 / 1024, 2) . ' MB');
    $this->comment('Total space: ' . number_format($totalSpace / 1024 / 1024, 2) . ' MB');
})->purpose('Display disk space information');

Artisan::command('now', function () {
    $this->comment('Current time is: ' . now()->toDateTimeString());
})->purpose('Display the current date and time');