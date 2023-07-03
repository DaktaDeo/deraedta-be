<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RelativeTime extends Component
{
    protected ?Carbon $dateTime;

    protected string $prefix = '';

    protected string $suffix = '';

    protected bool $hasDateTime = false;

    public function __construct($dateTime = null, ?string $prefix = '', ?string $suffix = '')
    {
        $this->dateTime = $dateTime;
        $this->hasDateTime = $dateTime !== null;

        $this->prefix = $prefix;
        $this->suffix = $suffix;
    }

    public function render(): View
    {
        return view('components.relative-time', [
            'prefix' => $this->prefix,
            'suffix' => $this->suffix,
            'dateTime' => $this->dateTime,
            'hasDateTime' => $this->hasDateTime,
        ]);
    }
}
