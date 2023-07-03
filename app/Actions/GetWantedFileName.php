<?php

namespace App\Actions;

class GetWantedFileName extends FileAction
{
    public function __invoke(string $view): string
    {
        $wantedFile = "$view.md";
        if (! $this->disk->exists($wantedFile)) {
            $wantedFile = "$view/index.md";

            if (! $this->disk->exists($wantedFile)) {
                abort(404);
            }

            return $wantedFile;
        }

        return $wantedFile;
    }
}
