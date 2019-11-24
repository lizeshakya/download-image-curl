<?php

namespace App\Exports;

use App\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersExport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $pathToDownload = base_path('hello');
        $iteration = 0;
        foreach ($rows as $row) {
            $iteration++;
            if ($iteration == 1) {
                continue;
            }
            $newFolderName = $pathToDownload . DIRECTORY_SEPARATOR . $row[2];
            if (!is_dir($newFolderName)) {
                \File::makeDirectory($newFolderName);
            }
            $url1 = $row[3];
            $url2 = $row[4];
            $url3 = $row[5];
            $url4 = $row[6];

            if (!empty($url1)) {
                $content1 = file_get_contents($url1);
                $file = $newFolderName;
                file_put_contents($file, $content1);
            }

            if (!empty($url2)) {
                $content2 = file_get_contents($url2);
                $file = base_path($newFolderName);
                file_put_contents($file, $content2);
            }

            if (!empty($url3)) {
                $content3 = file_get_contents($url3);
                $file = base_path($newFolderName);
                file_put_contents($file, $content3);
            }

            if (!empty($url4)) {
                $content4 = file_get_contents($url4);
                $file = base_path($newFolderName);
                file_put_contents($file, $content4);
            }
        }
    }
}
