<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model implements HasMedia
{
    use HasFactory;
    use InterecatsWithMedia;

    protected $guarded = ['id'];

    public function addFile($file)
    {
        $media = $this->addMedia($file)->toMediaCollection('files', 'minio');
        $this->media_id = $media->id;
        $this->update();
    }
}
