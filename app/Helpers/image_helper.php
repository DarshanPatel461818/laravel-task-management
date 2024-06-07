<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function uploadSingleImage($file, $directory = 'uploads') {
    $timestamp = Carbon::now()->timestamp;
    $extension = $file->getClientOriginalExtension();
    $filename = $timestamp . '.' . $extension;

    if (!Storage::disk('public')->exists($directory)) {
        Storage::disk('public')->makeDirectory($directory);
    }

    $path = $file->storeAs($directory, $filename, 'public');

    return $path;

}
