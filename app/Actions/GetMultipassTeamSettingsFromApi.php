<?php

namespace App\Actions;

use DaktaDeo\LaravelMultipassConnector\Http\Controllers\SettingsController;
use DaktaDeo\LaravelMultipassConnector\Models\CpqSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class GetMultipassTeamSettingsFromApi
{
    protected string $cacheKey = 'app::website.settings';

    public function fetch(Request $request, bool $updateSession = true): CpqSettings
    {
        if (Cache::has($this->cacheKey)) {
            return Cache::get($this->cacheKey);
        }

        $settings = new CpqSettings();

        $resource = app(SettingsController::class)->getAppWebsiteSettings($request);
        if ($resource !== null) {
            $settings = new CpqSettings($resource->toArray($request));
        }

        Cache::forever($this->cacheKey, $settings);
        if ($updateSession) {
            $request->session()->put('settings', $settings);
        }

        return $settings;
    }
}
