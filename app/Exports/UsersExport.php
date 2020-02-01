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
        $pathToDownload = storage_path('hello');
        $iteration = 0;
        foreach ($rows as $row) {
            $iteration++;
            if ($iteration == 1) {
                continue;
            }
            $newFolderName = $pathToDownload . DIRECTORY_SEPARATOR . $row[2];
            if (!is_dir($newFolderName)) {
                \Storage::makeDirectory($newFolderName);
            }
            $url1 = $row[3];
            $url2 = $row[4];
            $url3 = $row[5];
            $url4 = $row[6];


            if (!empty($url1)) {
                $content1 = file_get_contents($url1);
                Storage::put($row[2] . '/' . time() . uniqid()  . '.jpg', $content1);
            }

            if (!empty($url2)) {
                $content2 = file_get_contents($url2);
                Storage::put($row[2] . '/' . time() . uniqid()  . '.jpg', $content2);
            }

            if (!empty($url3)) {
                $content3 = file_get_contents($url3);
                Storage::put($row[2] . '/' . time() . uniqid()  . '.jpg', $content3);
            }

            if (!empty($url4)) {
                $content4 = file_get_contents($url4);
                Storage::put($row[2] . '/' . time() . uniqid()  . '.jpg', $content4);
            }
        }
    }
}
