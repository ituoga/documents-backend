<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function addFile($file)
    {
        $media = $this->addMedia($file)->toMediaCollection('files', 'minio');
        $this->media_id = $media->id;
        $this->update();
    }

    public function image()
    {
        return app('url')->assetFrom(config('app.images_url'), $this->getFirstMedia('files')->getPath());
    }
}
