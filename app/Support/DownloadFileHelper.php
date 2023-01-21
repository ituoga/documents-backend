<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class DownloadFileHelper
{
    public static function download($mediaItem)
    {
        $mi = $mediaItem->getMediaRepository()->getByIds([$mediaItem->media_id])[0];

        return response(Storage::disk("minio")->get($mi->getPath()))
        ->header('Cache-Control', 'no-cache private')
        ->header('Content-Description', 'File Transfer')
        ->header('Content-Type', $mi->mime_content_type)
        ->header('Content-Disposition', 'attachment; filename=' . $mediaItem->file_name)
        ->header('Content-Transfer-Encoding', 'binary');
    }
}
