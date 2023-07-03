<?php

namespace App\Actions;

use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;

abstract class FileAction
{
    public Filesystem $disk;

    public function __construct()
    {
        $this->disk = Storage::disk('content');
    }
}
