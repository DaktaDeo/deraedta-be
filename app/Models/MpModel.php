<?php

namespace App\Models;

use Jenssegers\Model\Model;

abstract class MpModel extends Model
{
    public string $key = '';

    public string $view = '';

    public string $last_modified = '';

    public array $frontMatter = [];

    public string $content = '';

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'last_modified' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

//        static::addGlobalScope('order', static function ($query) {
//            $query->orderBy('date', 'desc');
//        });
    }
}
