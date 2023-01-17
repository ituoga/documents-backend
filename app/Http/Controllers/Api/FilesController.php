<?php

namespace App\Http\Controllers\Api;

use App\Models\File;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\FileResource;
use App\Http\Requests\StoreFileRequest;

class FilesController extends Controller
{
    public function index()
    {
        $user = User::where('id', auth()->user()->id)->first();
        $files = $user->files()->latest()->paginate(10);

        return FileResource::collection($files);
    }

    public function store(StoreFileRequest $request)
    {
        $file = File::create($request->validated());

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $file->addFile($request->file('file'));
        }

        return new FileResource($file);
    }
}
