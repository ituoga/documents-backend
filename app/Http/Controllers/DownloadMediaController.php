<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use App\Support\DownloadFileHelper;

class DownloadMediaController extends Controller
{
    public function download($id)
    {
        $mediaItem = File::find($id);
        return DownloadFileHelper::download($mediaItem);
    }
}
