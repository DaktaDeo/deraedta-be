<?php

namespace App\Actions;

use Illuminate\Support\Collection;

/**
 * loop through a folder and get all files, including all files inside subdirectories
 * return a Collection with the file path from the root of the disk
 * if the extension is not md, skip this file
 */
class GetRelevantFilesFromFolder extends FileAction
{
    public function __invoke(string $folder): Collection
    {
        $id = 0;
        $files = collect();
        foreach ($this->disk->allFiles($folder) as $path) {
            // get the extension of the path
            $extension = pathinfo($path, PATHINFO_EXTENSION);
            // if the extension is not md, skip this file
            if ($extension !== 'md') {
                continue;
            }
            // remove the extension from the path
            $filename = str_replace('.'.$extension, '', $path);

            //add $filename to the collection when it is not index
            $files->push([
                'pk' => ++$id,
                'view' => $filename,
                'path' => $path,
            ]);
        }

        return $files;
    }
}
